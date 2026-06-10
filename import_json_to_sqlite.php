<?php

/**
 * Import JSON (phpMyAdmin export) vers SQLite Laravel
 * Usage : php import_json_to_sqlite.php
 * Placer ce fichier à la racine du projet Laravel
 */

$jsonFile = __DIR__ . '/u545412941_quebringue.json';
$sqliteFile = __DIR__ . '/database/database.sqlite';

if (!file_exists($jsonFile)) {
    die("❌ Fichier JSON introuvable : $jsonFile\n");
}

if (!file_exists($sqliteFile)) {
    die("❌ Fichier SQLite introuvable : $sqliteFile\n");
}

$json = file_get_contents($jsonFile);
$data = json_decode($json, true);

if (!$data) {
    die("❌ Impossible de parser le JSON\n");
}

$pdo = new PDO('sqlite:' . $sqliteFile);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Tables à importer (on exclut : cache, cache_locks, sessions, jobs, failed_jobs, migrations, password_reset_tokens, personal_access_tokens)
$tablesToImport = ['categories', 'events', 'images', 'localisation', 'users', 'reservations', 'category_event'];

$tableData = [];
foreach ($data as $entry) {
    if ($entry['type'] === 'table' && isset($entry['data']) && count($entry['data']) > 0) {
        $tableData[$entry['name']] = $entry['data'];
    }
}

foreach ($tablesToImport as $table) {
    if (!isset($tableData[$table])) {
        echo "⚠️  Table '$table' vide ou absente, on passe.\n";
        continue;
    }

    $rows = $tableData[$table];
    $count = 0;

    // Vider la table avant import
    $pdo->exec("DELETE FROM \"$table\"");

    foreach ($rows as $row) {
        $columns = array_keys($row);
        $placeholders = array_map(fn($c) => ":$c", $columns);

        $sql = sprintf(
            'INSERT OR REPLACE INTO "%s" (%s) VALUES (%s)',
            $table,
            implode(', ', array_map(fn($c) => "\"$c\"", $columns)),
            implode(', ', $placeholders)
        );

        $stmt = $pdo->prepare($sql);

        foreach ($row as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        $count++;
    }

    echo "✅ Table '$table' : $count lignes importées\n";
}

echo "\n🎉 Import terminé !\n";

<?php
/*Formularz imie data urodzenia - dane do pliku txt, segregacja w 2 pliku txt od najmlodszego do najstarszego*/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imie = $_POST['imie'] ?? '';
    $data = $_POST['data'] ?? '';
    $data = date('Y-m-d', strtotime($data));    

    $dane = fopen('dane.txt', 'a');
    fwrite($dane, $data . " " . $imie ."\n");
    fclose($dane);

    $linie = file("dane.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    rsort($linie);
    file_put_contents("sort.txt", implode("\n", $linie) . "\n");
    exit;
}
?>
<form method="post">
    <label>Imię:
        <input type="text" name="imie">
    </label>
    <label>Data urodzenia:
        <input type="date" name="data">
    </label>
    <button type="submit">Potwierdz</button>
</form>
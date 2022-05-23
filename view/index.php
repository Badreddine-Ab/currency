<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>currency</title>
</head>
<body>
    <form method="post">
        <select name="currency">
            <?php foreach($data['allCurrencies'] as $currency): ?>
                <option value="<?= $currency['ID']?>"><?= $currency['title'] ?></option>
            <?php endforeach ?>
        </select>
        <input type="number" name="value" placeholder="type a number" value="<?= isset($data['value']) ? $data['value'] : ''?>">
        <input type="submit" value="convert" name="convert">
    </form>

    <?php if(isset($data['answer'])) :?>
        <h2><?= $data['value'] . $data['name'] . " is equale to " . $data['answer'] . "DH"?></h2>
    <?php endif?>
</body>
</html>
<datalist id="textminlist">
    <?php for($i=5; $i<=250; $i+=5): ?>
        <option value="<?= $i ?>">
        <option value="-<?= $i ?>">
    <?php endfor; ?>
    <option value="500">
    <option value="-500">
</datalist>
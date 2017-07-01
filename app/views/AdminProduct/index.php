<?php include 'app/views/_global/header.php'; ?>
<article class="blok">
    <header>
        <h1>Spisak svih proizvoda</h1>
    </header>
    <a href="add">Dodaj</a>
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <td colspan="4" class="align-right">
                    <?php Misc::link('admin/proizvodi/add/', 'Dodaj novi proizvod.'); ?>
                </td>
            </tr>    
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Short text</th>
                <th>Long text</th>
                <th>Prikaz sata</th>
                <th>Cena</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($DATA['products'] as $product): ?>
            <tr>
                <td><?php echo $product->product_id;?></td>
                <td><?php echo htmlspecialchars($product->name);?></td>
                <td><?php echo htmlspecialchars($product->short_text);?></td>
                <td><?php echo htmlspecialchars($product->long_text);?></td>
                <td><?php echo htmlspecialchars($product->prikaz_sata);?></td>
                <td><?php echo htmlspecialchars($product->amount);?></td>
                <td><a href="<?php echo Misc::link('admin/proizvodi/edit/' . $product->product_id, 'Edit');?>">Edit</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</article>

<?php include 'app/views/_global/footer.php'; ?>

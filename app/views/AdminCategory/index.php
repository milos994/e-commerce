<?php include 'app/views/_global/header.php'; ?>
<article class="blok">
    <header>
        <h1>Spisak svih kategorija</h1>
    </header>
    <a href="./kategorije/add">Dodaj</a>
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <td colspan="4" class="align-right">
                    <?php Misc::link('admin/kategorije/add/', 'Dodaj novu kategoriju.'); ?>
                </td>
            </tr>    
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($DATA['kategorije'] as $kategorija): ?>
            <tr>
                <td><?php echo $kategorija->product_category_id;?></td>
                <td><?php echo htmlspecialchars($kategorija->name);?></td>
                <td><a href="<?php echo Misc::link('admin/kategorije/edit/' . $kategorija->product_category_id, 'Edit');?>">Edit</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</article>

<?php include 'app/views/_global/footer.php'; ?>

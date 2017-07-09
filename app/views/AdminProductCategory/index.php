<?php include 'app/views/_global/header.php'; ?>
<article class="container blok">
    <header>
        <h1 class="text-center mt-5">Spisak svih kategorija</h1>
    </header>
        <a class="btn btn-primary mt-3 mb-3" href="./add">Dodaj novu kategoriju</a> 
    <?php Misc::link('admin/kategorije/add/', 'Dodaj novu kategoriju'); ?>
    <table class="table table-hover table-condensed border mb-5">
        <div class="border-top">
            <thead class="table-danger">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center" colspan="2">Opcije</th>
                </tr>
            </thead>
        </div>
        <tbody>
            <?php foreach ($DATA['kategorije'] as $kategorija): ?>
            <tr>
                <td><?php echo $kategorija->product_category_id;?></td>
                <td class="text-center"><?php echo htmlspecialchars($kategorija->name);?></td>
                <td class="text-center"><a class="teal-text" href="<?php echo Misc::link('admin/kategorije/edit/' . $kategorija->product_category_id, 'Edit');?>"><i class="fa fa-pencil"></a></td>
                <td class="text-center"><a class="red-text" href="<?php echo Misc::link('admin/kategorije/delete/' . $kategorija->product_category_id, 'Delete');?>"><i class="fa fa-times"></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</article>

<?php include 'app/views/_global/footer.php'; ?>

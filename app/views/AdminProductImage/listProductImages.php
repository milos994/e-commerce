<?php require_once 'app/views/_global/admin-header.php'; ?>
<article class="container blok">
    <header>
        <h1 class="text-center mt-5">Spisak svih slika</h1>
    </header>
    
    <a class="btn btn-primary mt-3 mb-3" href="./add">Dodaj novu sliku</a> 
    <?php var_dump($DATA['product_id']); die(); ?>
    <?php Misc::link('admin/slike/proizvodi/' . $DATA['product_id'] . '/add', 'Dodavanje nove slike za proizvod'); ?>
    <table class="table table-hover table-condensed border mb-5">
        <div class="border-top">
            <thead class="table-danger">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Slika</th>
                    <th class="text-center" colspan="2">Opcije</th>
                </tr>
            </thead>
        </div>
        <tbody>
            <?php foreach($DATA['images'] as $image): ?>
            <tr>
                <td><?php echo $image->image_id;?></td>
                <td class="text-center">
                    <img src='<?php echo Configuration::BASE_URL . htmlspecialchars($image->path);?>'>
                </td>
                <td class="text-center"><a class="teal-text" href="<?php echo Misc::link( $DATA['product_id'] . '/edit/' . $image->image_id, 'Delete');?>"><i class="fa fa-pencil"></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</article>

<?php require_once 'app/views/_global/footer.php'; ?>

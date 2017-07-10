<?php require_once 'app/views/_global/admin-header.php'; ?>
<article class="container blok">
<header>
    <h1 class="text-center mt-5">Spisak svih proizvoda</h1>
</header>

<a class="btn btn-primary mt-3 mb-3" href="<?php echo Configuration::BASE_URL; ?>admin/proizvodi/add">Dodaj novi proizvod</a> 
<table class="table table-condensed border mb-5">
    <thead class="table-danger">   
        <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Short text</th>
            <th class="text-center">Long text</th>
            <th class="text-center">Kategorija</th>
            <th class="text-center">Prikaz sata</th>
            <th class="text-center">Cena</th>
            <th class="text-center" colspan="2">Opcije</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($DATA['products'] as $product): ?>
        <tr>
            <td><?php echo htmlspecialchars($product->name);?></td>
            <td><?php echo htmlspecialchars($product->short_text);?></td>
            <td><?php echo htmlspecialchars($product->long_text);?></td>
            <td><?php echo htmlspecialchars($product->category_name);?></td>
            <td><?php echo htmlspecialchars($product->prikaz_sata);?></td>
            <td><?php echo htmlspecialchars($product->amount);?></td>
            <td class="text-center"><a class="teal-text" href="<?php echo Misc::link('admin/proizvodi/edit/' . $product->product_id, 'Edit');?>"><i class="fa fa-pencil"></i></a></td>
            <td class="text-center"><a class="red-text" href="<?php echo Misc::link('admin/proizvodi/delete/' . $product->product_id, 'Delete');?>"><i class="fa fa-times"></i></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</article>

<?php require_once 'app/views/_global/footer.php'; ?>

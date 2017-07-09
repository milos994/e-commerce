<?php require_once 'app/views/_global/header.php'; ?>
<article class="container blok">
    <header>
        <h1 class="text-center mt-5">Spisak svih kategorija</h1>
    </header>
    
    <a class="btn btn-primary mt-3 mb-3" href="<?php echo Configuration::BASE_URL; ?>admin/kategorije/add">Dodaj novu kategoriju</a> 
    
    <table class="table table-condensed border mb-5">
        
        <div class="border-top">
            <thead class="table-danger">   
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Slug</th>
                    <th class="text-center" colspan="2">Opcije</th>
                </tr>
            </thead>
        </div>
        <tbody>
            <?php foreach ($DATA['kategorije'] as $kategorija): ?>
            <tr>
                <td><?php echo htmlspecialchars($kategorija->category_name);?></td>
                <td><?php echo htmlspecialchars($kategorija->slug);?></td>
                <td class="text-center"><a role="button" class="teal-text" href="<?php echo Configuration::BASE_URL; ?>admin/kategorije/edit/<?php  echo $kategorija->product_category_id?>"><i class="fa fa-pencil"></i></a></td>
                <td class="text-center"><a role="button" class="red-text" href="<?php echo Configuration::BASE_URL; ?>admin/kategorije/delete/<?php echo $kategorija->product_category_id?>"><i class="fa fa-times"></i></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</article>

<?php require_once 'app/views/_global/footer.php'; ?>

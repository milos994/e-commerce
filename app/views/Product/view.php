<?php include 'app/views/_global/header.php'; ?>

<table class="product-details-table">
    <thead>
    <tr>
        <th>Label</th>
        <th>Value</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th>Title:</th>
        <td><?php echo htmlspecialchars($DATA['product']->naziv); ?></td>
    </tr>
    <tr>
        <th>Price:</th>
        <td><?php echo htmlspecialchars($DATA['product']->cena); ?></td>
    </tr>
    <tr>
        <th>Description:</th>
        <td><?php echo htmlspecialchars($DATA['product']->opis); ?></td>
    </tr>
    <tr>
        <th>Product ID:</th>
        <td><?php echo htmlspecialchars($DATA['product']->id); ?></td>
    </tr>
    </tbody>
</table>

<?php include 'app/views/_global/footer.php'; ?>
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = 'Product List';
$this->breadcrumbs = array('Products', 'List Pagination');
?>

<h1>Product List with Pagination</h1>

<div>
    <?php echo CHtml::link('Create Product', array('product/create'), array('class' => 'btn btn-success')); ?>
</div>

<!-- Tabla de Productos -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataProvider->getData() as $product): ?>
            <tr>
                <td><?php echo CHtml::encode($product->id); ?></td>
                <td><?php echo CHtml::encode($product->name); ?></td>
                <td><?php echo CHtml::encode($product->price); ?></td>
                <td><?php echo CHtml::encode($product->stock); ?></td>
                <td><?php echo CHtml::encode($product->category->name); ?></td>
                <td>
                    <?php echo CHtml::link('Show', array('product/view', 'id' => $product->id)); ?>
                    <?php echo CHtml::link('Edit', array('product/update', 'id' => $product->id)); ?>
                    <?php echo CHtml::link('Delete', array('product/delete', 'id' => $product->id), array('confirm' => 'Are you sure?')); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Paginación -->
<div class="pagination">
    <?php
    $this->widget('CLinkPager', array(
        'pages' => $dataProvider->pagination,
        'maxButtonCount' => 5, // Número máximo de botones de página
    ));
    ?>
</div>

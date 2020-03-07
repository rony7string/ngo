<!-- Begin: Content -->
<div class="content">
    <div class="content-bottom">
        <div class="row-fluid">
            <div class="box span12">
                <div class="title">
                    <div class="head">
                        <i class="icon-edit icon-large"></i>
                        <h2>Item Details</h2>
                    </div>
                    <div class="actions">
                        <div class="item">
                            <i class="icon-minus collapse-box-toggle"></i>
                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class="form">
                        <form action="" method="post" class="form-horizontal form-bordered form-validate" id="frm1">
                            <div class="control-group">
                                <label for="manufacturer_name" class="control-label">Manufacturer</label>
                                <div class="controls">
                                    <?php echo $item['manufacturer_name']; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="code" class="control-label">Item Code</label>
                                <div class="controls">
                                    <?php echo $item['code']; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="name" class="control-label">Item Name</label>
                                <div class="controls">
                                    <?php echo $item['name']; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="description" class="control-label">Description</label>
                                <div class="controls">
                                    <?php echo $item['description']; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="sale_price" class="control-label">Sale Price</label>
                                <div class="controls">
                                    <?php echo $item['sale_price']; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End: Content -->
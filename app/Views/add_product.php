<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Krystian Kosior">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Add product</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <link href="headers.css" rel="stylesheet">
</head>
<body>
<main>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

            <div class="container d-flex flex-wrap justify-content-center">
                <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                    <span class="fs-4">Product Add</span>
                </a>

            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2" id="delete-product-btn" onclick="send()" >Add</button>
                <a href="<?php echo URLROOT ?>" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
            </div>
        </header>
    </div>
    <div class="b-example-divider">
    </div>
    <div class="row  py-3 mb-4 m-lg-4">
        <div class="col-6" >
            <form class="row g-3" id="product_form" >
                <div class="form-group row mb-lg-4" style="display: none">
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="id_product_type" name="id_product_type" placeholder="0" value="<?php echo $list_product[0]->getIdProductType()?>">
                    </div>
                </div>
                <div class="form-group row mb-lg-4">
                    <label for="sku" class="col-sm-2 col-form-label">sku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " id="sku" name="sku" placeholder="#sku">
                        <div class="invalid-feedback" id="sku_err"></div>
                    </div>
                </div>
                <div class="form-group row mb-lg-4">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        <div class="invalid-feedback" id="name_err"></div>
                    </div>
                </div>
                <div class="form-group row mb-lg-4">
                    <label for="price" class="col-sm-2 col-form-label">Price ($)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price" placeholder="0" required>
                        <div class="invalid-feedback" id="price_err"></div>
                    </div>
                </div>
                <div class="form-group row mb-lg-4">
                    <label for="price" class="col-sm-2 col-form-label">Type switcher</label>
                    <div class="col-sm-10">
                        <select id="productType" class="form-control" onchange="changeVisible()">
                            <?php $index =0; ?>
                            <?php foreach ($list_product as $product){ $index++;  ?>
                            <option <?php if($index==1){ ?> selected <?php } ?> value="<?php echo $product->getIdProductType()  ?>"><?php echo $product->getName()  ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <?php $index =0; ?>
                <?php foreach ($list_product as $product){  $index++; ?>
                <div id="<?php echo $product->getIdProductType()?>" <?php if($index>1){ ?> style="display: none;"<?php } ?> >
                    <?php foreach ($list_attributes as $attribute){ ?>
                        <?php if($product->getIdProductType() == $attribute->getIdProductType() ) { ?>
                            <div class="form-group row mb-lg-4">
                                <label for="name" class="col-sm-2 col-form-label"><?php echo $attribute->getUnitAttribute() ?></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="<?php echo $attribute->getCodeAttribute() ?>" name="<?php echo $attribute->getCodeAttribute() ?>" placeholder="" required>
                                    <div class="invalid-feedback" id="<?php echo $attribute->getCodeAttribute() ?>_err"></div>
                                </div>
                            </div>
                        <?php }?>
                    <?php } ?>
                </div>
                <?php } ?>
            </form>
        </div>
    </div>

</main>

<div class="fixed-bottom bg-body-tertiary">
    <div class="b-example-divider">
    </div>
    <div class="container">
        <footer class="mt-auto">
            <p class="text-center text-muted">&copy; Krystian Kosior</p>
        </footer>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" ></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script>
    var ids = [<?php foreach ($list_product as $product){ ?> <?php echo $product->getIdProductType().','?>  <?php } echo 0?>];
    function changeVisible() {
        var id = $('#productType').val();
        console.log(id);
        jQuery.each(ids, function (i, val) {
            if(val == id){
                $('#id_product_type').val(val);
                $('#'+val).show();
            }
            else{
                $('#'+val).hide();
            }
        });
    }
    function send(){
        $.ajax({
            url: '<?php echo URLROOT ?>/add-product',
            type : "POST",
            dataType : 'html',
            data : $("#product_form").serialize(),
            success : function(result) {
                var data = JSON.parse(result);
                if(data.is_ok){
                    window.location.replace("<?php echo URLROOT ?>");
                }
                else{
                    jQuery.each(data.error, function (i, val) {
                            var info =val.join('. ');
                            if(val.length > 0){
                                $('#'+i).addClass('is-invalid');
                                $('#'+i+'_err').text(info);
                            }
                            else {
                                $('#'+i).removeClass('is-invalid');
                            }
                    });
                }

                console.log(result);
            },
            error: function(xhr, resp, text) {
                console.log(xhr, resp, text);
            }
        });
    }
</script>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Krystian Kosior">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Product List</title>
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
                    <span class="fs-4">Product List</span>
                </a>

            <div class="col-md-3 text-end">
                <a href="<?php echo URLROOT ?>/add-product" class="btn btn-outline-primary me-2" role="button" aria-pressed="true">Add</a>
                <button type="button" class="btn btn-danger" id="delete-product-btn" onclick="massDelete()">Mass delete</button>
            </div>
        </header>
    </div>
    <div class="b-example-divider">
    </div>
    <div class="row">
        <?php foreach ($list as $element){?>
        <div class="col-3" id="col<?php echo $element->getIdProduct() ?>">
            <div class="m-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        <div class="form-check">
                            <input class="form-check-input delete-checkbox" type="checkbox" value="" id="<?php echo $element->getIdProduct() ?>" name="ss">
                        </div>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><?php echo $element->getSku() ?></li>
                        <li class="list-group-item"><?php echo $element->getNameProduct() ?></li>
                        <li class="list-group-item"><?php echo $element->getPrice().' $' ?></li>
                        <li class="list-group-item"><?php echo $element->getDescription().': '.$element->getValue().' '.$element->getCode() ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>


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
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" ></script>
<script>


    function massDelete(){
        var idsProductToRemove = [];
        jQuery('.delete-checkbox').each( function (i, val) {
            if(val.checked){
                idsProductToRemove.push(val.id);
            }
        });
        console.log(idsProductToRemove);
        if(idsProductToRemove.length >0){
            $.ajax({
                headers: {'X-Requested-With': 'XMLHttpRequest'},
                contentType: 'application/json',
                url: '<?php echo URLROOT ?>/remove-product',
                type : "POST",
                dataType : 'json',
                data : JSON.stringify({'listProducts' : idsProductToRemove }),
                success : function(result) {
                    console.log(result);
                    jQuery.each(idsProductToRemove, function (i, val) {
                       $('#col'+val).remove();
                    });
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        }
    }
</script>
</body>
</html>

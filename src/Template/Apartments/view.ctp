<head>
    <?= $this->Html->css('plugins/slick/slick.css') ?>
    <?= $this->Html->css('plugins/slick/slick-theme.css') ?>
    <?= $this->Html->css('lightbox.css') ?>
</head>
<div class="row  border-bottom white-bg dashboard-header">
    <h2 align="center"> Apartment Detail </h2>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox product-detail">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="apt-name">
                                <?= h($apartment->name) ?>
                            </h1>
                        </div>
                        <div class="col-md-6">
                            <div class="panel-heading">
                                <h2><i class="fa fa-picture-o" aria-hidden="true"></i> Property Images </h2>
                            </div>
                            <div class="product-images">
                                <?php if($apartment->image1): ?>
                                <div>
                                    <div class="image-imitation">
                                        <?= $this->Html->image('/img/uploads/image1/'.$apartment->image1, ['class' => 'img-responsive', 'onclick' => 'openModal();currentSlide(1)']); ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if($apartment->image2): ?>
                                <div>
                                    <div class="image-imitation">
                                        <?= $this->Html->image('/img/uploads/image2/'.$apartment->image2, ['class' => 'img-responsive', 'onclick' => 'openModal();currentSlide(2)']); ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if($apartment->image3): ?>
                                <div>
                                    <div class="image-imitation">
                                        <?= $this->Html->image('/img/uploads/image3/'.$apartment->image3, ['class' => 'img-responsive', 'onclick' => 'openModal();currentSlide(3)']); ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if($apartment->image4): ?>
                                <div>
                                    <div class="image-imitation">
                                        <?= $this->Html->image('/img/uploads/image4/'.$apartment->image4, ['class' => 'img-responsive', 'onclick' => 'openModal();currentSlide(4)']); ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel-heading" style="border-bottom: none; margin-bottom:0;">
                                <h2><i class="fa fa-info" aria-hidden="true"></i> Overview </h2>
                            </div>
                            <table class="table" style="font-size: 15px;">
                                <tbody>
                                <tr><th>ID</th><td><?= h(substr($apartment->area->prefecture,0,3)).'-'.h($apartment->area_id).'-'.h($apartment->id) ?></td></tr>
                                <tr><th>Address</th><td><?= h($apartment->area->prefecture).', '.h($apartment->area->ward).', '.h($apartment->address) ?></td></tr>
                                <tr><th>Prefecture</th><td><?= h($apartment->area->prefecture) ?></td></tr>
                                <tr><th>Ward</th><td><?= h($apartment->area->ward) ?></td></tr>
                                <tr><th>Rent</th><td><?= h($apartment->rent). ' Yen' ?></td></tr>
                                <tr><th>Service Fees</th><td><?= h($apartment->service_fee). ' Yen' ?></td></tr>
                                <tr><th>Floor</th><td><?= h($apartment->floor) ?></td></tr>
                                <tr><th>size</th><td><?= h($apartment->size). 'm2' ?></td></tr>
                                <tr><th>Modle PLan</th><td><?= h($model[$apartment->model_plan]) ?></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-md-6">
                            <div class="panel-heading" style="margin-bottom: 0;">
                                <h2 class="panel-title"><i class="fa fa-train"></i> Access</h2>
                            </div>
                            <div class="panel-body" style="padding-top: 0;">
                                <span class="traffic-test"><?= $apartment->traffic?></span>
                            </div>
                            <div class="panel-heading">
                                <h2 class="panel-title"><i class="fa fa-list-ol"></i> Facilities</h2>
                            </div>
                            <div class="panel-body" class="" itemprop="description">
                                <?= '| ' ?>
                                <?php foreach($facilities as $fac): ?>
                                <?= h($facility[$fac]). ' |' ?>
                                <?php endforeach; ?>
                            </div>
                            <div class="panel-heading" style="margin-bottom: 0;">
                                <h2 class="panel-title"><i class="fa fa-comments"></i> Remarks </h2>
                            </div>
                            <div class="panel-body" style="padding-top: 0;">
                                <span class="remark-test"><?= h($apartment->remarks) ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel-heading">
                                <h2 class="panel-title"><i class="fa fa-map-marker"></i> Location </h2>
                            </div>
                            <div id="map" class="google-map"></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>

<div id="myModal" class="modal">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <?php if($apartment->image1): ?>
    <div class="mySlides">
        <?= $this->Html->image('/img/uploads/image1/'.$apartment->image1, ['class' => 'img-responsive']); ?>
    </div>
    <?php endif; ?>

    <?php if($apartment->image2): ?>
    <div class="mySlides">
        <?= $this->Html->image('/img/uploads/image2/'.$apartment->image2, ['class' => 'img-responsive']); ?>
    </div>
    <?php endif; ?>

    <?php if($apartment->image3): ?>
    <div class="mySlides">
        <?= $this->Html->image('/img/uploads/image3/'.$apartment->image3, ['class' => 'img-responsive']); ?>
    </div>
    <?php endif; ?>

    <?php if($apartment->image4): ?>
    <div class="mySlides">
        <?= $this->Html->image('/img/uploads/image4/'.$apartment->image4, ['class' => 'img-responsive']); ?>
    </div>
    <?php endif; ?>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<!-- slick carousel-->
<?= $this->Html->script('plugins/slick/slick.min.js') ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO0qGyWPhL6tQ4pkLlpUh2A-wF7mLNc5Q" type="text/javascript">
</script>
<script>
    var traffic_test = $('.traffic-test').text();
    var traffic_result = traffic_test.replace(/\•/g,'<br/> •  ');   
    $('.traffic-test').html(traffic_result);

    var remark_test = $('.remark-test').text();
    var remark_result = remark_test.replace(/\•/g,'<br/> •  ');   
    $('.remark-test').html(remark_result);

    //Slick
    $(document).ready(function(){
        $('.product-images').slick({
            dots: true
        });
    });

    //JS to create a map with the mentioned address
    var geocoder;
    var map;
    var address = "<? echo $apartment->prefecture. ', ' . $apartment->ward. ', ' . $apartment->address ?>";

    function initialize() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);
        var myOptions = {
            zoom: 14,
            maxZoom: 20,
            minZoom: 3,
            center: latlng,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            },
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map"), myOptions);
        var pin = "<?php echo '/images/marker1.png'; ?>";
        if (geocoder) {
            geocoder.geocode({
                'address': address
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                        map.setCenter(results[0].geometry.location);
                        var infowindow = new google.maps.InfoWindow({
                            content: '<b>' + address + '</b>',
                            size: new google.maps.Size(150, 50)
                        });
                        var marker = new google.maps.Marker({
                            position: results[0].geometry.location,
                            map: map,
                            title: address,
                            icon: pin,
                        });
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow.open(map, marker);
                        });
                    } else {
                        alert("House was not located on google Maps. The address may have been written incorrectly. Sorry for inconvinience. We will correct it shortly.");
                    }
                } else {
                    alert("House was not located on google Maps. The address may have been written incorrectly. Sorry for inconvinience. We will correct it shortly.");
                }
            });
        }
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

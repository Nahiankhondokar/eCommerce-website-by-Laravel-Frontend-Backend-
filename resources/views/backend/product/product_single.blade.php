<div class="col-md-4">
    <div class="form-group">
        <h5>Main Thambnail<span class="text-danger">*</span></h5>
        <div class="controls">
         
            <label for="productThambnail"><img class="thambnail_selector" src="{{ URL::to('') }}/media/admin/porductThambnail/thambnail.png" alt="" style="width: 50px; cursor : pointer;"></label>

            <input id="productThambnail" type="file" style="display: none;" name="product_thamnail" class="form-control product_thambnail" >

            <h5 class="productThumbClose" style="display: none; cursor : pointer;">X</h5>
            <img class="productThambShow" src="" alt="" style="max-width: 80px;"> 
            
            @error('product_thamnail')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <a href=""></a>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <h5>Product Multiple Photos <span class="text-danger">*</span></h5>
        <div class="controls">

            <label for="product_gallery"><img class="gallery_selector" src="{{ URL::to('') }}/media/admin/porductThambnail/gallery.png" alt="" style="width: 50px; cursor : pointer;"></label>

            <input id="product_gallery" multiple type="file" class="form-control productGallery" style="display: none;" name="product_gallery[]" >

            <h5 class="productGalleryClose" style="display: none; cursor : pointer;">X</h5>
            <div class="productGalleryShow">
                
            </div>
            
            @error('feature_products')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <a href=""></a>
        </div>
    </div>
</div>
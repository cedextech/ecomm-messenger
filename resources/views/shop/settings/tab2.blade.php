<img src="{{ Auth::user()->shop->logo }}" id="image-logo-url" style="display: block;">

<span class="btn bg-olive btn-sm fileinput-button">
    <i class="glyphicon glyphicon-plus"></i>
    <span>Upload Logo</span>
    <input id="fileupload-logo" type="file" name="file" data-url="/shop/settings/uploadLogo">
</span>
<br />
<div id="progress_upload_logo">
    <div class="bar" style="width: 0%;"></div>
</div>
<br /><br />

<img src="{{ Auth::user()->shop->banner }}" id="image-banner-url" style="display: block;">

<span class="btn bg-olive btn-sm fileinput-button">
    <i class="glyphicon glyphicon-plus"></i>
    <span>Upload Banner</span>
    <input id="fileupload-banner" type="file" name="file" data-url="/shop/settings/uploadBanner">
</span>
<br />
<div id="progress_upload_banner">
    <div class="bar" style="width: 0%;"></div>
</div>
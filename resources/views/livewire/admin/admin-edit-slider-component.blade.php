<div>
    <div>
        <style>
            nav .svg {
                height: 20px;
            }

            nav .hidden {
                display: block !important;
            }

        </style>
        <div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Edit slider</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Edit slider</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-central">
            <div class="content_info">
                <div class="paddings-mini">
                    <div class="container">
                        <div class="row portfolioContainer">
                            <div class="col-md-8 col-md-offset-2 profile1">
                                <div class="panel panel-default">
                                    <div class="panel panel-heading">
                                        <div class="col-6">Edit slider</div>
                                        <div class="col-6">
                                            <a href="{{ route('admin.slider') }}"
                                                class="btn btn-info pull-right">
                                                All sliders</a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        @if (Session::has('message'))
                                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                                        @endif

                                        <form class="form-horizontal" wire:submit.prevent="updateSlider">
                                            @csrf
                                            <div class="form-group">
                                                <label for="title" class="control-lable col-ms-3">title:</label>
                                                <div>
                                                    <input type="text" name="title" class="form-control"
                                                        wire:model="title" >
                                                    @error('title')
                                                        <p class="text text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="image" class="control-lable col-ms-3"> image:</label>
                                                <div>
                                                    <input type="file" name="newimage" id="" class="form-control-file"
                                                        wire:model="newimage">
                                                </div>
                                                @error('newimage')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                                @if ($newimage)
                                                <img src="{{$newimage->temporaryUrl()}}" width="60">
                                                @else
                                                <img src="{{asset('images/slider')}}/{{$image}}" width="60">
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="discount Type" class="control-lable col-ms-3">status:</label>
                                                <div>
                                                    <select wire:model="status">
                                                        <option value="">Select</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>

                                                    </select>
                                                </div>
                                                @error('discount_type')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-success pull-right">Edit
                                                Slider</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>

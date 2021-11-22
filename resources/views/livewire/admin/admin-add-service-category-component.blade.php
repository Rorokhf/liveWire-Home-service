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
                    <h1>Add Service Category</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Add Service Category</li>
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
                                        <div class="col-6">Add new Service Category</div>
                                        <div class="col-6">
                                            <a href="{{ route('admin.service-category') }}"
                                                class="btn btn-info pull-right">
                                                All Categories</a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        @if (Session::has('message'))
                                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                                        @endif

                                        <form class="form-horizontal" wire:submit.prevent="creatServiceCat">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name" class="control-lable col-ms-3">Category name:</label>
                                                <div>
                                                    <input type="text" name="name" class="form-control"
                                                        wire:model="name" wire:keyup="generateSlug">
                                                    @error('name')
                                                        <p class="text text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="slug" class="control-lable col-ms-3">Category slug:</label>
                                                <div>
                                                    <input type="text" name="slug" class="form-control"
                                                        wire:model="slug" >
                                                </div>
                                                @error('slug')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="image" class="control-lable col-ms-3">Category image:</label>
                                                <div>
                                                    <input type="file" name="image" id="" class="form-control-file"
                                                        wire:model="image">
                                                </div>
                                                @error('image')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                                @if ($image)
                                                <img src="{{$image->temporaryUrl()}}" width="60">
                                                @endif
                                            </div>
                                            <button type="submit" class="btn btn-success pull-right">Add
                                                category</button>
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

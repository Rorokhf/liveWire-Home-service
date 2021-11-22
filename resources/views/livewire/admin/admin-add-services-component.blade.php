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
                    <h1>Add Service </h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Add Service </li>
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
                                    <div class="panel-heading">
                                        <div class="col-6">Add new Service </div>
                                        <div class="col-6">
                                            <a href="{{ route('admin.All-services') }}"
                                                class="btn btn-info pull-right">
                                                All Services</a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        @if (Session::has('message'))
                                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                                        @endif

                                        <form class="form-horizontal" wire:submit.prevent="creatService">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name" class="control-lable col-ms-3">name:</label>
                                                <div>
                                                    <input type="text" name="name" class="form-control"
                                                        wire:model="name" wire:keyup="generateSlug">
                                                    @error('name')
                                                        <p class="text text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="slug" class="control-lable col-ms-3"> slug:</label>
                                                <div>
                                                    <input type="text" name="slug" class="form-control"
                                                        wire:model="slug" >
                                                </div>
                                                @error('slug')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="tagline" class="control-lable col-ms-3"> tagline:</label>
                                                <div>
                                                    <input type="text" name="tagline" class="form-control"
                                                        wire:model="tagline" >
                                                </div>
                                                @error('tagline')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="service_category_id" class="control-lable col-ms-3"> Service Category:</label>
                                                <div>
                                                    <select wire:model="service_category_id">
                                                        <option value="">Select service Category</option>
                                                        @foreach ($scategory as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('service_category_id')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="Price" class="control-lable col-ms-3"> Price:</label>
                                                <div>
                                                    <input type="text" name="Price" class="form-control"
                                                        wire:model="Price" >
                                                </div>
                                                @error('Price')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="discount" class="control-lable col-ms-3"> discount:</label>
                                                <div>
                                                    <input type="text" name="discount" class="form-control"
                                                        wire:model="discount" >
                                                </div>
                                                @error('discount')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="discount Type" class="control-lable col-ms-3">discount Type:</label>
                                                <div>
                                                    <select wire:model="discount_type">
                                                        <option value="">Select discount type</option>

                                                        <option value="fixed">fixed</option>
                                                        <option value="percent">percent</option>

                                                    </select>
                                                </div>
                                                @error('discount_type')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="description" class="control-lable col-ms-3"> description:</label>
                                                <div>
                                                    <textarea class="form-control" wire:model="description"></textarea>
                                                </div>
                                                @error('description')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="inclusion" class="control-lable col-ms-3"> inclusion:</label>
                                                <div>
                                                    <textarea class="form-control" wire:model="inclusion"></textarea>
                                                </div>
                                                @error('inclusion')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="exclusion" class="control-lable col-ms-3"> exclusion:</label>
                                                <div>
                                                    <textarea class="form-control" wire:model="exclusion"></textarea>
                                                </div>
                                                @error('exclusion')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="thumbnail" class="control-lable col-ms-3">thumbnail:</label>
                                                <div>
                                                    <input type="file" name="thumbnail" id="" class="form-control-file"
                                                        wire:model="thumbnail">
                                                </div>
                                                @error('thumbnail')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                                @if ($thumbnail)
                                                <img src="{{$thumbnail->temporaryUrl()}}" width="60">
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="image" class="control-lable col-ms-3">image:</label>
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
                                                Service</button>
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

<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Profile</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>profile</li>
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
                                    <div class="row">
                                        <div class="col-md-6">profile</div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if ($sprovider->image)
                                                <img src="{{ asset('images/sproviders') }}/{{ $sprovider->image }}" width="100%">
                                            @else
                                                <img src="{{ asset('images/sproviders/1.png') }}" width="100%">
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <h3>Name: {{ Auth::user()->name }}</h3>
                                            <p>{{ $sprovider->about }}</p>
                                            <p><b>Email: </b>{{ Auth::user()->email }}</p>
                                            <p><b>Phone: </b>{{ Auth::user()->phone }}</p>
                                            <p><b>City: </b>{{ $sprovider->city }}</p>
                                            <p><b>Service Category:
                                                    @if ($sprovider->service_category_id)
                                                </b>{{ $sprovider->category->name }}</p>
                                            @endif

                                            <p><b>Service Location: </b>{{ $sprovider->service_locatons }}</p>
                                            <a href="{{route('s.edit-prpfile')}}" class="btb btn-info pull-right">Edit profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

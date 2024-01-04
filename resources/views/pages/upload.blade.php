<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="new-paper"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="New Paper"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
        <form method='POST' action="{{ route('new-paper') }}" enctype="multipart/form-data">
            <div class="row">
                
                <div class="col-md-7 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Paper Metadata Information</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            
                                @csrf
                                <div class="row">

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Paper Title <span class='text-danger inputerror'>*</span></label>
                                        <input type="text" name="title" placeholder="Paper Title" class="form-control border border-2 p-2" value='{{ old('title') }}'>
                                        @error('title')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label for="floatingTextarea2">Abstract <span class='text-danger inputerror'>*</span></label>
                                        <textarea class="form-control border border-2 p-2"
                                            placeholder=" Abstract" id="floatingTextarea2" name="abstract"
                                            rows="4" cols="50">{{ old('abstract') }}</textarea>
                                            @error('abstract')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Author(s) <span class='text-danger inputerror'>*</span></label>
                                        <input type="text" name="authors" class="form-control border border-2 p-2" value='{{ old('authors') }}'>
                                        @error('authors')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Paper Type <span class='text-danger inputerror'>*</span></label>
                                        <input type="text" name="paperType" class="form-control border border-2 p-2" value='{{ old('paperType') }}'>
                                        @error('paperType')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                    </div>
                                
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Keywords (seperated by comma) <span class='text-danger inputerror'>*</span></label>
                                        <input type="text" name="keywords" class="form-control border border-2 p-2" value='{{ old('keywords') }}'>
                                        @error('keywords')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Year <span class='text-danger inputerror'>*</span></label>
                                        <input type="text" name="year" class="form-control border border-2 p-2" value='{{ old('year') }}'>
                                        @error('year')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Paper Accessibility <span class='text-danger inputerror'>*</span></label>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-primary active">
                                                <input type="radio" name="scope" id="public" value="public" autocomplete="off" > Public
                                            </label>
                                            <label class="btn btn-primary">
                                                <input type="radio" name="scope" id="private" value="private" autocomplete="off" checked> Private
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Month</label>
                                        <input type="text" name="month" class="form-control border border-2 p-2" value='{{ old('month') }}'>
                                        @error('month')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>
                                    
                                    

                                </div>
                                
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mt-4">
                    <div class="card mb-4">
                        <div class="card-header pb-0 px-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0">Paper Upload</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input btn btn-primary" id="fileUpload">
                                <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->

                                @error('file')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>
                            <div class="row">
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">DOI</label>
                                    <input type="text" name="doi" class="form-control border border-2 p-2" value='{{ old('doi') }}'>
                                    @error('doi')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Url</label>
                                    <input type="url" name="url" class="form-control border border-2 p-2" value='{{ old('url') }}'>
                                    @error('url')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn bg-gradient-dark">Submit</button>
                    </div>
                </div>
                
            </div>
            </form>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>

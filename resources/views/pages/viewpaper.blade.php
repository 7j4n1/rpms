<x-layout bodyClass="bg-gray-200">

        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <!-- Navbar -->
                    <x-navbars.navs.guest signin='login' signup='register'></x-navbars.navs.guest>
                    <!-- End Navbar -->
                </div>
            </div>
        </div>
        <main class="main-content ">
        <div class="container-fluid  mt-7">
            <div class="row bg-white px-8">
                <div class="col-md-12 mt-4">
                    <h4 class="" style="color: black">{{ $paper->paper_title }}</h4>
                    <p style="color: black">{{$paper->month . ' ' . $paper->year}}</p>
                    <p style="color: black">DOI: <a href="dx.doi.org/{{$paper->doi}}">{{$paper->doi}}</a></p>
                </div>
                <div class="col-md-6 mt-4">
                    <h4 class="" style="color: black; font-size:medium; font-weight:500;">{{ $paper->co_authors }}</h4>
                </div>
                <hr />
            </div>

            <div class="row mx-8">
            <div class="col-md-7 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h5 style="font-size: medium; font-weight:200; color:#000">Abstract</h5>
                            <hr class="mb-0"></hr>
                        </div>
                        <div class="card-body pt-4 p-3">
                            
                                <div class="row">

                                    <div class="mb-3 col-md-12">
                                        <span style="color: black">{{$paper->abstract}}</span>
                                    </div>
                                </div>
                                
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mt-4">
                    <div class="card mb-4">
                        <div class="card-header pb-0 px-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <hr class="mb-0"></hr>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-4 p-3">
                            
                            <div class="row">
                                
                                <div class="mb-3 col-md-6">
                                    <a href="{{url('/public/').$paper->file_path}}" class="btn bg-gradient-dark">Download Full-Text</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        </main>
        @push('js')
<script src="{{ asset('assets') }}/js/jquery.min.js"></script>
<script>
    $(function() {

    var text_val = $(".input-group input").val();
    if (text_val === "") {
      $(".input-group").removeClass('is-filled');
    } else {
      $(".input-group").addClass('is-filled');
    }
});
</script>
@endpush
</x-layout>

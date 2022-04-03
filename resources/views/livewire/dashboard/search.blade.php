<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                       
                            
                        </div>
                       
                        <div class="col-lg-8 d-flex justify-content-end">
                                <div class="app-search m-2">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"  wire:model="search" id="search" type="search">
                                        <span class="bx bx-search-alt"></span>
                                        <div wire:loading class="spinner top-0 mr-10 right-0 mt-5 " style="position: absolute"></div> 
                                        @if (strlen($search) > 2)

                                            <ul class="overflow-auto h-64 absolute z-50 bg-white border border-gray-300 w-full rounded-md mt-2 text-gray-700 text-sm divide-y divide-gray-200" x-show="isVisible">
                                                @forelse ($searchResults as $result)
                                                    <li>
                                                        <a
                                                            @if (array_key_exists('trackViewUrl', $result))
                                                                href="{{ $result['trackViewUrl'] }}"
                                                            @else
                                                                href="#"
                                                            @endif
                                                            class="flex items-center px-4 py-4 hover:bg-gray-200 transition ease-in-out duration-150">
                                                            <img src="{{ $result['artworkUrl60'] }}"
                                                                alt="album art" class="w-10">
                                                            <div class="ml-4 leading-tight">
                                                                <div class="font-semibold">
                                                                    @if (array_key_exists('trackName', $result))
                                                                        {{ $result['trackName'] }}
                                                                    @else
                                                                        Untitled
                                                                    @endif
                                                                </div>
                                                                <div class="text-gray-600">
                                                                    @if (array_key_exists('artistName', $result))
                                                                        {{ $result['artistName'] }}
                                                                    @else
                                                                        No Artist
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @empty
                                                    <li class="px-4 py-4">No results found for "{{ $search }}"</li>
                                                @endforelse
                                            </ul>
                                            @endif
                                    </div>
                                </div>
                                
                        </div>
                    </div>
            </div>
        </div>
</div>
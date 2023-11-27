@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <!-- Other content -->

    <!-- Display Data -->
    <!-- Display Data -->
  <h1 class="text-center p-2">Data SRS</h1>

  <div class="container">
      <div class="row">
          <div class="col">
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama Modul</th>
                          <th scope="col">Requirement</th>
                          <th scope="col">Mockup</th>
                      </tr>
                  </thead>
                  <tbody>
                      @php
                          $no = 1;
                      @endphp
                      @forelse ($modul as $srs)
                          @forelse ($srs->moduls as $modul)
                              @forelse ($modul->requirements as $requirement)
                                  <tr>
                                      <th scope="row">{{ $no++ }}</th>
                                      <td>{{ $modul->nama }}</td>
                                      <td>{{ $requirement->requirement }}</td>
                                      <td>
                                        @if ($requirement->mockup)
                                        <img src="{{ asset($requirement->mockup) }}" alt="Mockup Image" width="100">
                                        @else
                                            No Mockup
                                        @endif
                                      </td>
                                  </tr>
                              @empty
                                  <tr>
                                      <td colspan="4">No requirements for this modul</td>
                                  </tr>
                              @endforelse
                          @empty
                              <tr>
                                  <td colspan="4">No moduls for this Formsrs</td>
                              </tr>
                          @endforelse
                      @empty
                          <tr>
                              <td colspan="4">No Formsrs data</td>
                          </tr>
                      @endforelse
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>

@endsection

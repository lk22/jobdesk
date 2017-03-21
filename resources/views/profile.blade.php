@extends('layouts.app')

@section('content')

    <div class="container grey lighten-5" id="profile">
            <div class="col s12 m10 push-m3 l10 push-l1 profile-header">
                <div class="row">
                    <div class="center-align avatar">
                            <img src="{{ auth()->user()->avatar }}" height="150" width="150" alt="">
                    </div>
                    <div class="col s2 m4 push-m1 l4 push-l1">
                        <h5 class="center-align">
                            {{ auth()->user()->name }}
                        </h5>
                        <p class="center-align auth-email">Email: <a href="mailto:{{ auth()->user()->email }}"> {{ auth()->user()->email }} </a></p>
                        <p class="center-align auth-dream-job">Dream job: <span>{{ auth()->user()->dream_job_title }}</span></p>

                            @if (count($jobs) > 1)
                                <p>
                                    du har {{count($jobs)}} job ansøgninger <a data-target="jobsModal" href="#jobsModal" class="center-align modal-trigger btn-floating btn-large blue job-modal-btn">se her</a>
                                </p>
                            @else
                                <p>
                                    du har 1 job ansøgning <a data-target="jobsModal" href="#jobsModal" class="center-align modal-trigger job-modal-btn">se her</a>
                                </p>
                            @endif

                            @if(auth()->user()->has_active_email)
                                <p class="center-align" style="color:#2ab27b;">Bruger er aktiv</p>
                            @else
                                <p class="center-align" style="color:#F34C4C;">Bruger er ikke aktiv :( <span>tjek din mail</span></p>
                            @endif

                    </div>
                </div>
            </div>

            <div class="col l3 push-l2">
                <p class="left-align">World</p>
            </div>
    </div>

    <div class="fixed-action-btn">
        <a data-target="jobsModal" href="#jobsModal" class=" modal-trigger btn-floating btn-large blue job-modal-btn">
          <i class="material-icons">speaker_notes</i>
        </a>
  </div>

  <!-- jobs list modal  -->
  <div id="jobsModal" class="modal bottom-sheet" style="max-height: 100%">
      <div class="modal-content">
          <div class="job-application-list">
              @if (count($jobs))
                  <table class="responsive-table">
                      <thead>
                          <td>Job Ansøgninger</td>
                      </thead>
                      <tbody>
                          @foreach ($jobs as $job)
                              <tr>
                                  <td>
                                      <a href="{{ route('job', [Auth::user()->slug, $job->slug]) }}">
                                          {{ substr($job->title, 0, 50) }}
                                      </a>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              @endif
          </div>
      </div>

      <div class="modal-footer">
          <a href="{{ route('new.application', Auth::user()->slug) }}" class="modal-action modal-close waves-effect waves-green btn-green"><i class="material-icons">open_in_new</i></a>
          <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
      </div>
  </div>


@endsection

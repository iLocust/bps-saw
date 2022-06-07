<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{(url('/'))}}">{{ config('app.name') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="#">{{ strtoupper(substr(config('app.name'), 0, 2)) }}</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="dropdown">
        <a href="/setting" class="nav-link"><i class="far fa-cog"></i> <span>Profile Settings</span></a>
    </li>

    @if (auth()->user()->isAdmin())
    <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Pekerjaan</span></a>
        <ul class="dropdown-menu" style="display: none;">
          <li><a class="nav-link" href="{{'/list-job'}}">List Pekerjaan</a></li>
          <li><a class="nav-link" href="{{route('admin.jobs.penugasan')}}">Tambah Pekerjaan</a></li>
        </ul>
      </li>
    @elseif (auth()->user()->isPengawas())
    <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Pekerjaan</span></a>
        <ul class="dropdown-menu" style="display: none;">
          <li><a class="nav-link" href="{{'/list-job'}}">List Pekerjaan</a></li>
          <li><a class="nav-link" href="{{route('pengawas.jobs.penugasan')}}">Tambah Pekerjaan</a></li>
        </ul>
      </li>
    @endif

    @if (auth()->user()->isAdmin() || auth()->user()->isPengawas())
        <li><a class="nav-link" href="{{route('surat-tugas.create')}}"><i class="fas fa-envelope"></i> <span>Surat Tugas</span></a></li>
        <li><a class="nav-link" href="{{route('pegawai.create')}}"><i class="fas fa-plus-square"></i> <span>Tambah Pegawai</span></a></li>
        <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Kriteria & Bobot</span></a>
        <ul class="dropdown-menu" style="display: none;">
          <li><a class="nav-link" href="{{'/kriteria'}}">Kriteria</a></li>
          <li><a class="nav-link" href="{{'/subkriteria'}}">Sub Kriteria</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Penilaian Kinerja</span></a>
        <ul class="dropdown-menu" style="display: none;">
          <li><a class="nav-link" href="{{'/penilaian'}}">Penilaian</a></li>
          <li><a class="nav-link" href="{{'/normalisasi'}}">Normalisasi</a></li>
          <li><a class="nav-link" href="{{'/ranking'}}">Ranking</a></li>
        </ul>
      </li>
    @endif

    <li class=><a href="{{'/credits'}}"><i class="fas fa-info"></i> <span>Credits</span></a></li>
  </ul>
</aside>

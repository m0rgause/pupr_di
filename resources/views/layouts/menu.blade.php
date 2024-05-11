@php
$url = request()->url();
@endphp

<div class="sidebar-menu">
  <ul class="menu">
    <li class="sidebar-item {{ $url == route('dashboard') ? 'active' : '' }}">
      <a href="{{route('dashboard')}}" class="sidebar-link">
        <i class="bi bi-speedometer"></i>
        <span>Dashboard</span>
      </a>
    </li>
    {{-- lantai --}}
    <li class="sidebar-item {{ $url == route('admin.lantai') ? 'active' : '' }}">
      <a href="{{route('admin.lantai')}}" class="sidebar-link">
        <i class="bi bi-buildings-fill"></i>
        <span>Lantai</span>
      </a>
    </li>
    {{-- ruangan --}}
    <li class="sidebar-item  {{ $url == route('admin.ruang') ? 'active' : '' }}">
      <a href="{{route('admin.ruang')}}" class="sidebar-link">
        <i class="bi bi-building-fill"></i>
        <span>Ruang</span>
      </a>
    </li>
    {{-- asesmen --}}
    <li class="sidebar-item  {{ $url == route('admin.asesmen') ? 'active' : '' }}">
      <a href="{{route('admin.asesmen')}}" class="sidebar-link">
        <i class="bi bi-clipboard-data"></i>
        <span>Ruang Asesmen</span>
      </a>
    </li>
    {{--jadwal asesmen --}}
    <li class="sidebar-item  {{ $url == route('admin.jadwal') ? 'active' : '' }}">
      <a href="{{route('admin.jadwal')}}" class="sidebar-link">
        <i class="bi bi-calendar2-week"></i>
        <span>Jadwal Asesmen</span>
      </a>
    </li>
    {{-- setting --}}
    <li class="sidebar-item  {{ $url == route('admin.setting') ? 'active' : '' }}">
      <a href="{{route('admin.setting')}}" class="sidebar-link">
        <i class="bi bi-gear"></i>
        <span>Setting</span>
      </a>
    </li>
    {{-- logout --}}
    <li class="sidebar-item">
      <a href="{{ route('signout') }}" class="sidebar-link">
        <i class="bi bi-box-arrow-right"></i>
        <span>Sign Out</span>
      </a>
    </li>
  </ul>
</div>
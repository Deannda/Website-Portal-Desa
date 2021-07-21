

<!-- header section start -->
		<header class="head4">
			<img src="cetus/images/header.jpg">
		</header>
		<!-- header section start -->
		<section class="menu">
			<div class="container">
				
				<div class="row">
					
					<div class="col-md-12">
						<div class="menubar">
							<div class="responsive-menu">
								<div class="responsive-menu-show">
									<span></span>
									<span></span>
									<span></span>
								</div>
								<div class="responsive-menu-hidden">
									<i class="fa fa-times" aria-hidden="true"></i>
								</div>
							</div>
							<ul class="menubar-ul">
								<li><a href="/beranda">BERANDA</a></li>
								<li class="menuclick-lii menu-main-res menu-icon"><a href="#">PROFIL DESA</a>
									<ul class="dropdown-menu-show menu-ul-main">
										<li><a href="/profil">Profil Wilayah Desa</a></li>
										<li><a href="/sejarah">Sejarah Desa</a></li>
									</ul>
								</li>
								<li class="menuclick-lii menu-main-res menu-icon"><a href="#">PEMERINTAH DESA</a>
									<ul class="dropdown-menu-show menu-ul-main">
										<li><a href="/visimisi">Visi Misi</a></li>
										<li><a href="/perangkatdesa">Perangkat Desa</a></li>
									</ul>
								</li>
								<li class="menuclick-lii menu-main-res menu-icon"><a href="#">DATA DESA</a>
									<ul class="dropdown-menu-show menu-ul-main">
										<li><a href="/wilayahadministratif">Wilayah Adminsitratif</a></li>
										<li><a href="/agama">Data Agama</a></li>
										<li><a href="/Gender">Data Jenis Kelamin</a></li>
										<li><a href="pekerjaan">Data Pekerjaan</a></li>
										<li><a href="/pendidikan">Data Pendidikan</a></li>
										<li><a href="Warga">Data Warga Negara</a></li>
										
									</ul>
								</li>
								<li class="menuclick-lii menu-main-res menu-icon"><a href="#">DANA DESA</a>
									<ul class="dropdown-menu-show menu-ul-main">
										@foreach ($anggaran as $drpdwn)
										<li><a href="/details_anggaran/{{$drpdwn->id_anggaran}}">Anggaran Tahun {{ $drpdwn->tahun_anggaran }}</a></li>
										@endforeach
										<!-- <li><a href="/anggarandesa">Anggaran Tahun 2020</a></li> -->
									</ul>
								</li>
					
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section><!-- header section end --
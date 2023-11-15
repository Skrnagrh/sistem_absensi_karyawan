<div class="modal fade" id="showKaryawan{{ $karyawan->nip }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content p-2">
            <div class="modal-header">
                <h6 class="modal-title fs-5" id="exampleModalLabel">Detail Data Karyawan</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-start">
                <div id="print-area{{ $karyawan->nip }}" class="print-area">
                    <table border="1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="justify-content: flex-end; width: 35%; padding: 50px;" colspan="6">
                                    <img src="/logo/kop.png" class="img-fluid"
                                        style="max-height: 80px; border: #009970">
                                </th>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                            </tr>
                        </thead>
                        <tbody style="text-transform: capitalize;">
                            <tr>
                                <td style="width: 25%"><strong>No Induk Karyawan</strong></td>
                                <td colspan="4"><strong>{{ $karyawan->nip }}</strong></td>
                                <th style="justify-content: flex-end; width: 20%; padding: 2px;" rowspan="6">
                                    @if ($karyawan->image)
                                    <img src="{{'storage/'.$karyawan->image }}" class="img-thumbnail"
                                        style="width: 250px">
                                    @else
                                    <img src="/default.png" class="img-thumbnail" style="width: 210px">
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td style="width: 25%"><strong>No KTP</strong></td>
                                <td colspan="4">{{ $karyawan->idcard }}</td>
                            </tr>
                            <tr>
                                <td style="width: 25%"><strong>Nama Lengkap</strong></td>
                                <td colspan="4">{{ $karyawan->name }}</td>
                            </tr>
                            <tr>
                                <td style="width: 25%"><strong>Tempat, Tanggal Lahir</strong></td>
                                <td colspan="4">{{ $karyawan->tempat }}, {{ $karyawan->tgllahir }}</td>
                            </tr>
                            <tr>
                                <td style="width: 25%"><strong>Jenis Kelamin</strong></td>
                                <td colspan="4">{{ $karyawan->jenkel }}</td>
                            </tr>
                            <tr>
                                <td style="width: 25%"><strong>Agama</strong></td>
                                <td colspan="4">{{ $karyawan->agama }}</td>
                            </tr>
                            <tr>
                                <td style="width: 25%"><strong>Alamat Lengkap</strong></td>
                                <td colspan="5">{{ $karyawan->alamat }}</td>
                            </tr>
                            <tr>
                                <td style="width: 25%"><strong>Nomor Hp</strong></td>
                                <td colspan="5">{{ $karyawan->nohp }}</td>
                            </tr>
                            <tr>
                                <td style="width: 25%"><strong>Pendidikan</strong></td>
                                <td colspan="5">{{ $karyawan->pendidikan }}, Lulus Tahun {{ $karyawan->lulus }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%"><strong>Status Pernikahan</strong></td>
                                <td colspan="5">{{ $karyawan->status }}</td>
                            </tr>
                            <tr>
                                <td style="width: 25%"><strong>Jabatan</strong></td>
                                <td colspan="5">{{ $karyawan->posisi }} - {{ $karyawan->jabatan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                {{-- <a type="button" class="btn btn-danger text-white" data-bs-dismiss="modal" aria-label="Close">Batal</a> --}}
                <a href="/karyawan/{{ $karyawan->nip }}" class="btn btn-danger"
                    data-bs-toggle="modal" data-bs-target="#showKaryawan{{ $karyawan->nip }}">
                    Batal
                </a>
                <a class="no-print btn btn-secondary" href="javascript:printDiv('print-area{{ $karyawan->nip }}');"><i
                        class="bi bi-printer"></i>
                    Print</a>
            </div>
        </div>
    </div>
</div>

<textarea id="printing-css"
    style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="0"] caption{border:none;font-style:italic}.no-print{display:none}, colspan, rowspan</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script>
    function printDiv(elementId) {
        var a = document.getElementById('printing-css').value;
        var b = document.getElementById(elementId).innerHTML;
        window.frames["print_frame"].document.title = document.title;
        window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
        window.frames["print_frame"].window.focus();
        window.frames["print_frame"].window.print();
    }
</script>

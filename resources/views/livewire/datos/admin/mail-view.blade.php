<div>

    <div class="grid grid-cols-3">
        <div class="col-span-1 p-3">
          <p class="text-2xl font-bold text-blue-800">Asunto</p>
            <hr>
            <input type="text" class="py-2 my-3 w-full" wire:model="subject" >
            <hr>
            <p class="text-2xl font-bold text-blue-600">Titulo</p>
            <hr>
            <input type="text" class="py-2 my-3 w-full" wire:model="title" >
            <hr>
            <p class="text-2xl font-bold text-blue-400">Cuerpo del mail</p>
            <hr>
            <textarea class="w-full my-3 p-2 border border-black" rows="10" wire:model="text"></textarea>
            <hr>

            <div x-data="{ open: false }">
            <p class="text-2xl">Elija los cursitos <button @click="open = ! open" class=""><i class="fas fa-chevron-down"></i></button></p>

              
              <div x-show="open" @click.away="open = false" x-transition.scale.80 >
                @for ($i = 0; $i < count($courses); $i++)
                    <div class="my-2 flex justify-between">
                        <div class="bg-green-500  py-1 px-2 rounded">

                            {{$courses[$i]->nombre ?? $courses[$i]['nombre']}}
                        </div>
                        <input type="checkbox" wire:click="addDelete({{$courses[$i]->id ?? $courses[$i]['id']}})">
                    </div>
                    <hr class="my-1">
                @endfor
              </div>
            </div>
            
            <div class="grid grid-cols-2">

              <div class="col-span-1">
                <p class="text-blue-600 text-xl font-bold">Filtro <i class="fas fa-filter"></i></p>
                <div class="border border-blue-300 p-3 ">
                  <div>
                    <label for="">Estado : </label>
                    <select class="border-2 border-blue-400" wire:model="case">
                      <option value="{{null}}">Sin estado</option>
                      <option value="na">No antiende</option>
                      <option value="ni">No interesado</option>
                      <option value="posible">Posible</option>
                    </select>
                  </div>
                  <div>
                    <label for="">Desde : </label>
                    <input class="p-1 border-blue-400 border-2 " type="date" wire:model="fechaDesde">
                  </div>
                  <div>
                    <label for="">Hasta : </label>
                    <input class="p-1 border-blue-400 border-2 " type="date" wire:model="fechaHasta">
                  </div>
                  <br>
                  <div>
                    <button class="py-1 px-5 rounded bg-blue-500 text-white" wire:click="searchData()">
                      Filtrar
                    </button>
                  </div>
                </div>
              </div>
              <div class="col-span-1">
                <p class="text-lg mb-3">Se enviaran <b>{{count($datosMail)}}</b> mail(s) </p>
                <button class="px-2 py-2 bg-blue-900 text-white w-1/2 rounded-md my-2" wire:click="sendMail">Enviar</button>
                <div wire:loading class="animate-spin"> <i class="fas fa-spinner fa-2x"></i></div>
                @foreach ($campaigns as $j => $item)
                    <div class="flex justify-between">
                      <label for="">{{$item}}</label>
                      <input type="checkbox" wire:click="addData('{{$item}}')">
                    </div>
                @endforeach
              </div>
            </div>

        </div>

        <div class="col-span-2">
        
        
        
        <!DOCTYPE html>
        <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
        <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width,initial-scale=1">
          <meta name="x-apple-disable-message-reformatting">
          <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
          <!--[if mso]>
          <style>
            table {border-collapse:collapse;border-spacing:0;border:none;margin:0;}
            div, td {padding:0;}
            div {margin:0 !important;}
          </style>
          <noscript>
            <xml>
              <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
              </o:OfficeDocumentSettings>
            </xml>
          </noscript>
          <![endif]-->
          <style>
            table, td, div, h1, p {
              font-family: 'Open Sans', sans-serif;
            }
            @media screen and (max-width: 530px) {
              .unsub {
                display: block;
                padding: 8px;
                margin-top: 14px;
                border-radius: 6px;
                background-color: #8b8b8b;
                text-decoration: none !important;
                font-weight: bold;
              }
              .col-lge {
                max-width: 100% !important;
              }
            }
            @media screen and (min-width: 531px) {
              .col-sml {
                max-width: 40% !important;
              }
              .col-lge {
                max-width: 55% !important;
              }
            }
          </style>
        </head>
        <body style="margin:0;padding:0;word-spacing:normal;background-color:#dadada;">
          <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#dbdbdc;">
            <table role="presentation" style="width:100%;border:none;border-spacing:0;">
              <tr>
                <td align="center" style="padding:0;">
                  <!--[if mso]>
                  <table role="presentation" align="center" style="width:600px;">
                  <tr>
                  <td>
                  <![endif]-->
                  <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:center;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                    <tr>
                      <td style="padding:40px 30px 30px 30px;text-align:center;font-size:24px;font-weight:bold;">
                        <a href="https://www.worknow-cursos.com/intro" style="text-decoration:none;margin-bottom:100px;"><img src="https://www.worknow-cursos.com/img/logo-wn.png" width="165" alt="Logo" style="width:80%;max-width:165px;height:auto;border:none;text-decoration:none;color:#ffffff;"></a>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:30px;background-color:#ffffff;">
                        <h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">{{$title}}</h1>
                        <p style="margin-bottom:20px;">
                            {!!$textMod!!}
                        </p>
                        <div>
                            <p style="margin:0;"><a href="https://www.worknowcursos.com/inscripcion" style="background: #387eff; text-decoration: none; padding: 10px 25px; color: #ffffff; border-radius: 4px; display:inline-block; mso-padding-alt:0;text-underline-color:#ff3884"><!--[if mso]><i style="letter-spacing: 25px;mso-font-width:-100%;mso-text-raise:20pt">&nbsp;</i><![endif]--><span style="mso-text-raise:10pt;font-weight:bold;">Probá gratis la primer unidad del curso</span><!--[if mso]><i style="letter-spacing: 25px;mso-font-width:-100%">&nbsp;</i><![endif]--></a></p>
                        </div>
                    </td>
                    </tr>
                    
         
                   
                    <!–– Imagen curso principal ––>
                    <tr>
                      <td style="padding:0;font-size:24px;line-height:28px;font-weight:bold;">
                        <a href="https://www.worknowcursos.com/show-course/28" style="text-decoration:none;"><img src="C:\Users\Brenda\Desktop\Email marketing - html\Impresora-3d.jpg" width="600" alt="" style="width:100%;height:auto;display:block;border:none;text-decoration:none;color:#363636;"></a>
                      </td>
                    </tr>
                    <tr>
                        <td style="padding:30px;background-color:#ffffff;">
                          <h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">Elegí {{count($selectedCourses)}} cursos más y accedé a promociones</h1>
                        </td>
                    </tr>
        
                    @foreach ($selectedCourses as $course)
                      <!–– Curso 1 ––>
                      <tr>
                        <td style="padding:35px 30px 11px 30px;font-size:0;background-color:#ffffff;border-bottom:1px solid #f0f0f5;border-color:rgba(201,201,207,.35);">
                          <!--[if mso]>
                          <table role="presentation" width="100%">
                          <tr>
                          <td style="width:145px;" align="left" valign="top">
                          <![endif]-->
                          <div class="col-sml" style="display:inline-block;width:100%;max-width:300px;vertical-align:top;text-align:left;font-size:14px;color:#363636;">
                            <img src="https://www.worknow-cursos.com/{{@$course[0]->url_img ?? $course[0]['url_img']}}" width="300" alt="" style="width:100%;max-width:300px;margin-bottom:20px;">
                          </div>
                          <!--[if mso]>
                          </td>
                          <td style="width:395px;padding-bottom:20px;" valign="top">
                          <![endif]-->
                          <div class="col-lge" style="display:inline-block;width:100%;max-width:200px;vertical-align:top;padding-bottom:20px;font-size:16px;line-height:22px;color:#363636;">
                            <p style="margin-top:0;margin-bottom:12px;">{{@$course[0]->nombre ?? $course[0]['nombre']}}</p>
                            <p style="margin:0;"><a href="https://www.worknowcursos.com/show-course/{{@$course[0]->id ?? $course[0]['id']}}" style="background: #387eff; text-decoration: none; padding: 10px 25px; color: #ffffff; border-radius: 4px; display:inline-block; mso-padding-alt:0;text-underline-color:#ff3884"><!--[if mso]><i style="letter-spacing: 25px;mso-font-width:-100%;mso-text-raise:20pt">&nbsp;</i><![endif]--><span style="mso-text-raise:10pt;font-weight:bold;">Ver más</span><!--[if mso]><i style="letter-spacing: 25px;mso-font-width:-100%">&nbsp;</i><![endif]--></a></p>
                          </div>
                          <!--[if mso]>
                          </td>
                          </tr>
                          </table>
                          <![endif]-->
                        </td>
                      </tr>
                    @endforeach
                   
                    
                    <tr>
                      <td style="padding:30px;font-size:24px;line-height:28px;font-weight:bold;background-color:#ffffff;border-bottom:1px solid #f0f0f5;border-color:rgba(201,201,207,.35);">
                        <a href="https://www.worknow-cursos.com/intro" style="text-decoration:none;"><img src="C:\Users\Brenda\Desktop\Email marketing - html\Estudiante.jpg" width="540" alt="" style="width:100%;height:auto;border:none;text-decoration:none;color:#363636;"></a>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:30px;text-align:center;font-size:12px;background-color:#404040;color:#cccccc;">
                        <p style="margin:0 0 8px 0;"><a href="https://www.instagram.com/worknowcursos/?hl=es" style="text-decoration:none;"><img  src="https://img.icons8.com/ios-filled/50/ffffff/instagram-new.png"/>
                             <a width="40" height="40" alt="f" style="display:inline-block;color:#cccccc;"></a> <a href="https://www.facebook.com/WorkNowcursos/" style="text-decoration:none;"><img src="https://img.icons8.com/ios-filled/50/ffffff/facebook--v1.png"/> <a width="40" height="40" alt="t" style="display:inline-block;color:#7c7c7c;"></a></p>
                        <p style="margin:0;font-size:14px;line-height:20px;">&reg; Work now, 2021<br><a class="unsub" href="" style="color:#cccccc;text-decoration:underline;">Cancelar la suscripción</a></p>
                      </td>
                    </tr>
                  </table>
                  <!--[if mso]>
                  </td>
                  </tr>
                  </table>
                  <![endif]-->
                </td>
              </tr>
            </table>
          </div>
        </body>
        </html>
        
        </div>
    </div>


</div>

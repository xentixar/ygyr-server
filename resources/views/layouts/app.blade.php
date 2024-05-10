<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
<div>
    <aside class="bg-white w-[270px] h-screen shadow fixed">
        <div class="py-3 text-center">
            <strong><a href="/">{{ config('app.name') }}</a></strong>
        </div>
        <div class="mt-4">
            <a href="{{route('dashboard')}}"
               class="block p-3 mb-1 hover:bg-slate-100 {{request()->routeIs('dashboard') ? 'bg-slate-100' : ''}}">Dashboard</a>
            <a href="{{route('admin.users.index')}}"
               class="block p-3 mb-1 hover:bg-slate-100 {{request()->routeIs('admin.users.index') || request()->routeIs('admin.users.create') || request()->routeIs('admin.users.edit') ? 'bg-slate-100' : ''}}">Users</a>
            <a href="{{route('admin.labels.index')}}"
               class="block p-3 mb-1 hover:bg-slate-100 {{request()->routeIs('admin.labels.index') || request()->routeIs('admin.labels.create') || request()->routeIs('admin.labels.edit') || request()->routeIs('admin.usages.index') || request()->routeIs('admin.usages.create') || request()->routeIs('admin.usages.edit') ? 'bg-slate-100' : ''}}">Labels</a>
        </div>
    </aside>
    <main class="bg-slate-50 min-h-screen  ms-[270px] ">
        <nav class="bg-white shadow px-6 py-3 flex justify-between">
            <a href="" class="text-2xl">&equiv;</a>
            <div x-data="{open:false}">
                <svg @click="open=!open" height="30" width="30" class="rounded-full border cursor-pointer" id="Layer_1"
                     xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 333.815 333.815" xml:space="preserve">
                    <g id="XMLID_1400_">
                        <g id="XMLID_1401_">
                            <g id="XMLID_1402_">
                                <path id="XMLID_1403_" style="fill:#F3D8B6;" d="M250.097,238.262c-18.667-6.681-51.458-11.736-51.458-81.376h-29.23h-5.002
                                    h-29.23c0,69.64-32.791,74.695-51.458,81.376c0,47.368,68.832,48.824,80.688,53.239v1.537c0,0,0.922-0.188,2.501-0.68
                                    c1.579,0.492,2.501,0.68,2.501,0.68v-1.537C181.265,287.086,250.097,285.63,250.097,238.262z"/>
                            </g>
                            <path id="XMLID_1404_" style="fill:#EEC8A2;" d="M198.639,156.886h-29.23h-2.834v135.573c0.11-0.033,0.216-0.064,0.333-0.101
                                c1.579,0.492,2.501,0.68,2.501,0.68V291.5c11.856-4.414,80.688-5.871,80.688-53.238
                                C231.43,231.581,198.639,226.526,198.639,156.886z"/>
                        </g>
                        <g id="XMLID_1405_">

                            <ellipse id="XMLID_65_" transform="matrix(0.3543 -0.9351 0.9351 0.3543 41.877 286.6909)"
                                     style="fill:#EDCEAE;"
                                     cx="228.54" cy="113.021" rx="17.187" ry="10.048"/>

                            <ellipse id="XMLID_64_" transform="matrix(0.3543 0.9351 -0.9351 0.3543 172.9698 -24.4475)"
                                     style="fill:#F3DBC4;"
                                     cx="104.188" cy="113.029" rx="17.187" ry="10.048"/>
                        </g>
                        <g id="XMLID_1406_">
                            <g id="XMLID_1407_">
                                <path id="XMLID_1408_" style="fill:#F3DBC4;" d="M166.91,180.733c-27.454,0-48.409-23.119-57.799-40.456
                                    s-15.888-79.445,4.34-106.897c19.808-26.883,53.459-13.838,53.459-13.838s33.649-13.045,53.458,13.838
                                    c20.226,27.452,13.726,89.56,4.335,106.897C215.311,157.614,194.359,180.733,166.91,180.733z"/>
                            </g>
                            <path id="XMLID_1409_" style="fill:#EDCEAE;" d="M220.368,33.381c-19.81-26.884-53.458-13.838-53.458-13.838
                                s-0.118-0.045-0.335-0.123v161.305c0.112,0.001,0.222,0.009,0.335,0.009c27.449,0,48.401-23.119,57.794-40.456
                                C234.094,122.941,240.595,60.833,220.368,33.381z"/>
                        </g>
                        <g id="XMLID_1410_">
                            <g id="XMLID_1411_">
                                <path id="XMLID_1414_" style="fill:#545465;" d="M286.89,293.134v40.681H46.926v-40.681c0-30.431,17.377-56.963,40.605-70.913
                                    c6.043-3.641,19.69-7.43,26.844-9.196c5.953-1.488,53.438,22.729,53.438,22.729s48.674-23.218,54.627-21.729
                                    c7.154,1.766,17.802,4.554,23.844,8.196C269.513,236.171,286.89,262.702,286.89,293.134z"/>
                            </g>
                            <path id="XMLID_1417_" style="fill:#494857;" d="M246.285,222.22c-6.043-3.641-16.69-6.429-23.844-8.196
                                c-5.953-1.488-54.627,21.729-54.627,21.729s-0.442-0.225-1.239-0.627v98.688H286.89v-40.681
                                C286.89,262.703,269.513,236.171,246.285,222.22z"/>
                        </g>
                        <g id="XMLID_1418_">
                            <polygon id="XMLID_1419_" style="fill:#D7734A;" points="188.575,240.372 166.908,233.538 145.241,240.372 159.555,251.364
                                150.575,333.814 183.241,333.814 174.261,251.364 		"/>
                            <polygon id="XMLID_1420_" style="fill:#D35D3B;" points="188.575,240.372 166.908,233.538 166.575,233.643 166.575,333.814
                                183.241,333.814 174.261,251.364 		"/>
                        </g>
                        <g id="XMLID_1421_">
                            <path id="XMLID_1422_" style="fill:#FFFFFF;" d="M215.075,209.247l-48.167,23.441l-48.167-23.441
                                c-11.5,5.5,10.396,38.436,14.833,36.833c10.963-3.96,33.334-10.329,33.334-10.329s22.371,6.369,33.334,10.329
                                C204.679,247.683,226.575,214.747,215.075,209.247z"/>
                            <path id="XMLID_1423_" style="fill:#DEDDE0;" d="M215.075,209.247l-48.167,23.441l-0.333-0.162v3.321
                                c0.211-0.061,0.333-0.095,0.333-0.095s22.371,6.369,33.334,10.329C204.679,247.683,226.575,214.747,215.075,209.247z"/>
                        </g>
                        <g id="XMLID_1424_">
                            <path id="XMLID_1427_" style="fill:#E1A98C;" d="M183.075,160.793l-16.452-3.907l-15.881,3.907l2.282,20.541
                                c4.299,1.752,8.946,2.791,13.886,2.791c4.938,0,9.585-1.039,13.883-2.791L183.075,160.793z"/>
                            <path id="XMLID_1428_" style="fill:#D2987B;" d="M166.623,156.886l-0.048,0.012v27.219c0.112,0.001,0.222,0.009,0.334,0.009
                                c4.938,0,9.585-1.039,13.883-2.791l2.282-20.542L166.623,156.886z"/>
                        </g>
                        <g id="XMLID_1429_">
                            <g id="XMLID_1430_">
                                <path id="XMLID_1433_" style="fill:#E1A98C;" d="M223.571,25.321c-2.159,0.08-12.282-31.303-39.282-24.303
                                    c-18.537,4.806-20.877,7.419-28.12,9.463c-29.41-9.014-57.539,14.472-56.495,36.488c1.759,37.07-4.778,36.505-0.295,49.454
                                    s8.466,23.407,8.466,23.407s0.996,3.565,2.988-16.854s-4.705-31.379,11.137-31.379c52.452,0-19.698,20.372,13.952,20.372
                                    c33.391,0,59.203-27.381,74.92-29.372c15.716-1.992,9.145,19.96,11.137,40.379s2.988,16.854,2.988,16.854
                                    s8.92-9.712,8.466-23.407C232.923,80.969,239.803,24.719,223.571,25.321z"/>
                            </g>
                            <path id="XMLID_1434_" style="fill:#D2987B;" d="M223.571,25.322c-2.159,0.08-12.282-31.303-39.282-24.303
                                c-8.808,2.284-13.956,4.071-17.714,5.539V84.84c18.759-8.259,33.769-20.913,44.268-22.243c15.716-1.992,9.145,19.96,11.137,40.379
                                c1.992,20.419,2.988,16.854,2.988,16.854s8.92-9.712,8.466-23.407C232.923,80.969,239.803,24.719,223.571,25.322z"/>
                        </g>
                        <g id="XMLID_1435_">

                            <ellipse id="XMLID_33_" transform="matrix(0.3543 -0.9351 0.9351 0.3543 41.877 286.6909)"
                                     style="fill:#EDCEAE;"
                                     cx="228.54" cy="113.021" rx="17.187" ry="10.048"/>

                            <ellipse id="XMLID_32_" transform="matrix(0.3543 0.9351 -0.9351 0.3543 172.9698 -24.4475)"
                                     style="fill:#F3DBC4;"
                                     cx="104.188" cy="113.029" rx="17.187" ry="10.048"/>
                        </g>
                    </g>
                </svg>
                <div x-show="open" @click.outside="open = false"
                     class="bg-gray-200 fixed rounded top-[56px] pt-2 right-0 min-w-[200px] z-50">
                    <a href="" class="py-3 px-3 block mb-2 hover:bg-gray-100">Profile</a>
                    <hr>
                    <a href="#" onclick="this.nextElementSibling.submit()"
                       class="py-3 px-3 block mb-2 hover:bg-gray-100 text-red-600">Logout</a>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>

        <div class="p-5">
            {{$slot}}
        </div>
    </main>
</div>
</body>

</html>

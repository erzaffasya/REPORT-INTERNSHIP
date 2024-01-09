<x-app-layout>
    <div class="row">
        <div class="col-lg-7 position-relative z-index-2">
            <div class="card card-plain mb-4">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <h2 class="font-weight-bolder mb-0">General Statistics</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <div class="card  mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Money
                                        </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            $53,000
                                            <span class="text-success text-sm font-weight-bolder">+55%</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card ">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Users
                                        </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            2,300
                                            <span class="text-success text-sm font-weight-bolder">+3%</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6 mt-sm-0 mt-4">
                    <div class="card  mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">New Clients</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            +3,462
                                            <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card ">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Sales</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            $103,430
                                            <span class="text-success text-sm font-weight-bolder">+5%</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div id="globe" class="position-absolute end-0 top-10 mt-sm-3 mt-7 me-lg-7">
                <canvas width="700" height="600" class="w-lg-100 h-lg-100 w-75 h-75 me-lg-0 me-n10 mt-lg-5"></canvas>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            var ctx = document.getElementById("chart-bars").getContext("2d");

            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Sales",
                        tension: 0.4,
                        borderWidth: 0,
                        borderRadius: 4,
                        borderSkipped: false,
                        backgroundColor: "#fff",
                        data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                        maxBarThickness: 6
                    }, ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                            },
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 500,
                                beginAtZero: true,
                                padding: 15,
                                font: {
                                    size: 14,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                                color: "#fff"
                            },
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false
                            },
                            ticks: {
                                display: false
                            },
                        },
                    },
                },
            });


            var ctx2 = document.getElementById("chart-line").getContext("2d");

            var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

            gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
            gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
            gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

            var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

            gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
            gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
            gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

            new Chart(ctx2, {
                type: "line",
                data: {
                    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                            label: "Mobile apps",
                            tension: 0.4,
                            borderWidth: 0,
                            pointRadius: 0,
                            borderColor: "#cb0c9f",
                            borderWidth: 3,
                            backgroundColor: gradientStroke1,
                            fill: true,
                            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                            maxBarThickness: 6

                        },
                        {
                            label: "Websites",
                            tension: 0.4,
                            borderWidth: 0,
                            pointRadius: 0,
                            borderColor: "#3A416F",
                            borderWidth: 3,
                            backgroundColor: gradientStroke2,
                            fill: true,
                            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                            maxBarThickness: 6
                        },
                    ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                padding: 10,
                                color: '#b2b9bf',
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                color: '#b2b9bf',
                                padding: 20,
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });


            (function() {
                const container = document.getElementById("globe");
                const canvas = container.getElementsByTagName("canvas")[0];

                const globeRadius = 100;
                const globeWidth = 4098 / 2;
                const globeHeight = 1968 / 2;

                function convertFlatCoordsToSphereCoords(x, y) {
                    let latitude = ((x - globeWidth) / globeWidth) * -180;
                    let longitude = ((y - globeHeight) / globeHeight) * -90;
                    latitude = (latitude * Math.PI) / 180;
                    longitude = (longitude * Math.PI) / 180;
                    const radius = Math.cos(longitude) * globeRadius;

                    return {
                        x: Math.cos(latitude) * radius,
                        y: Math.sin(longitude) * globeRadius,
                        z: Math.sin(latitude) * radius
                    };
                }

                function makeMagic(points) {
                    const {
                        width,
                        height
                    } = container.getBoundingClientRect();

                    // 1. Setup scene
                    const scene = new THREE.Scene();
                    // 2. Setup camera
                    const camera = new THREE.PerspectiveCamera(45, width / height);
                    // 3. Setup renderer
                    const renderer = new THREE.WebGLRenderer({
                        canvas,
                        antialias: true
                    });
                    renderer.setSize(width, height);
                    // 4. Add points to canvas
                    // - Single geometry to contain all points.
                    const mergedGeometry = new THREE.Geometry();
                    // - Material that the dots will be made of.
                    const pointGeometry = new THREE.SphereGeometry(0.5, 1, 1);
                    const pointMaterial = new THREE.MeshBasicMaterial({
                        color: "#989db5",
                    });

                    for (let point of points) {
                        const {
                            x,
                            y,
                            z
                        } = convertFlatCoordsToSphereCoords(
                            point.x,
                            point.y,
                            width,
                            height
                        );

                        if (x && y && z) {
                            pointGeometry.translate(x, y, z);
                            mergedGeometry.merge(pointGeometry);
                            pointGeometry.translate(-x, -y, -z);
                        }
                    }

                    const globeShape = new THREE.Mesh(mergedGeometry, pointMaterial);
                    scene.add(globeShape);

                    container.classList.add("peekaboo");

                    // Setup orbital controls
                    camera.orbitControls = new THREE.OrbitControls(camera, canvas);
                    camera.orbitControls.enableKeys = false;
                    camera.orbitControls.enablePan = false;
                    camera.orbitControls.enableZoom = false;
                    camera.orbitControls.enableDamping = false;
                    camera.orbitControls.enableRotate = true;
                    camera.orbitControls.autoRotate = true;
                    camera.position.z = -265;

                    function animate() {
                        // orbitControls.autoRotate is enabled so orbitControls.update
                        // must be called inside animation loop.
                        camera.orbitControls.update();
                        requestAnimationFrame(animate);
                        renderer.render(scene, camera);
                    }
                    animate();
                }

                function hasWebGL() {
                    const gl =
                        canvas.getContext("webgl") || canvas.getContext("experimental-webgl");
                    if (gl && gl instanceof WebGLRenderingContext) {
                        return true;
                    } else {
                        return false;
                    }
                }

                function init() {
                    if (hasWebGL()) {
                        window
                        window.fetch(
                                "https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard-pro/assets/js/points.json"
                            )
                            .then(response => response.json())
                            .then(data => {
                                makeMagic(data.points);
                            });
                    }
                }
                init();
            })();
        </script>
    @endpush
</x-app-layout>

@extends('backend.layouts.app', ['pageSlug' => 'dashboard'])

@section('title', 'Dashboard')

@push('link_css')

@endpush

@push('css')
@endpush

@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center mt-3">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ number_format($users->count()) }}</h3>
                        <p>Total Admin</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-user-gear"></i>
                    </div>
                    <a href="{{ route('b.admin.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ number_format($authors->count()) }}</h3>
                        <p>Total Author</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <a href="{{ route('b.author.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ number_format($categories->count()) }}</h3>
                        <p>Total Category</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-folder"></i>
                    </div>
                    <a href="{{ route('b.category.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ number_format($subCategories->count()) }}</h3>
                        <p>Total Sub Category</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-folder-tree"></i>
                    </div>
                    <a href="{{ route('b.sub_category.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <canvas id="doughnutChart"></canvas>
                    </div>
                    <div class="col-md-8">
                        <canvas id="lineChart"></canvas>
                    </div>
                    <div class="col-md-12 mt-3">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection

@push('link_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js" integrity="sha512-ZwR1/gSZM3ai6vCdI+LVF1zSq/5HznD3ZSTk7kajkaj4D292NLuduDCO1c/NT8Id+jE58KYLKT7hXnbtryGmMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@push('script')
<script>
    const categories = @json($topCategories->pluck('name'));
    const totalNews = @json($topCategories->pluck('total_news'));
    const topPosts = @json($topNews);
    const labels = topPosts.map(post => post.title);
    const data = topPosts.map(post => post.visitors);
    const months = @json($months);
    const postCounts = @json($postCounts);
</script>

<script>
    $(document).ready(function() {
        var ctx = document.getElementById('doughnutChart').getContext('2d');
        var doughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: categories,
                datasets: [{
                    label: 'Total News',
                    data: totalNews,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        text: 'Top 5 Categories by Total News'
                    }
                }
            }
        });


        const ctx2= document.getElementById('barChart').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Visitors',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 1)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        text: 'Top 10 News by Total Visitors'
                    }
                }
            }
        });


        const ctx3 = document.getElementById('lineChart').getContext('2d');
        new Chart(ctx3, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Number of Posts',
                    data: postCounts,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        text: 'Total News by Month'
                    }
                }
            }
        });
    });
</script>
@endpush

<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-black-800 leading-tight">
                Charts
            </h2>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-green-500 border-double border-4 border-blue-500 overflow-hidden shadow-xl sm:rounded-lg">
                 <div>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="lg:text-center">
      <br>
      <div class = "chart">
        <apexchart :width="chart.width" :height="chart.height" :type="chart.type" :options="chart.options" :series="chart.series"></apexchart>
    </div>
    <br>
    <br>

    <div class = "chart">
        <apexchart :width="chart2.width" :height="chart2.height" :type="chart2.type" :options="chart2.options" :series="chart2.series"></apexchart>
    </div>
    <br>
    <br>

     <div class = "chart">
        <apexchart :width="chart3.width" :height="chart3.height" :type="chart3.type" :options="chart3.options" :series="chart3.series"></apexchart>
    </div>
    <br>
    <br>

    <div class = "chart">
        <apexchart :width="chart4.width" :height="chart4.height" :type="chart4.type" :options="chart4.options" :series="chart4.series"></apexchart>
    </div>
    
    
    
    </div>
  </div>
</div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<style>
.chart{
    background-color: white;
}
</style>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },
        props: {
            chart: Object,
            chart2:Object,
            chart3:Object,
            chart4:Object,
            
        },
    }
</script>

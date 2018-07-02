<template>
    <div>

        <div class="block">
            <span class="demonstration">スライダー</span>
            <el-slider v-model="value1"></el-slider>
        </div>

        <!-- コンポーネントで変化する値を利用してみる -->
        <div>{{ value1 }}</div>

    </div>
</template>

<script>
export default {
    name: 'app',
    data() {
      return {
        value1: 50
      }
    }
}
</script>
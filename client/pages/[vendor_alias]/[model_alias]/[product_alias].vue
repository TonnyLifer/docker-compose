<script  setup>
import axios from "axios";
import { ref } from "vue";

const route = useRoute()

const {$api} = useNuxtApp()

const product_alias = ref([])
const get_vendor_alias = () => {
  $api.get('/catalog/vendor_alias/model_alias/'+route.params.product_alias).then(response => {
      console.log(response.data)
      product_alias.value = response.data.product
    }).catch(error => {
        console.log(error)
    })
}
watchEffect(get_vendor_alias)
</script>
<template>
    <ul class="w-96" v-if="product_alias">
    <li
      class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
      {{ product_alias.name }}
    </li>
    <li
      class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
      {{ product_alias.nickname }}
    </li>
    <li
      class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
      {{ product_alias.manufacturer.name }}
    </li>
    <li
      class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
      {{ product_alias.model_auto.name }}
    </li>
    <li
      class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
      {{ product_alias.width }} - {{ product_alias.height }} - {{ product_alias.diameter }}
    </li>
  </ul>
  <ul v-else>не найдено</ul>
</template>
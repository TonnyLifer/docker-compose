<script  setup>
import axios from "axios";
import { ref } from "vue";

const {$api} = useNuxtApp()

const width = ref(null)
const height = ref(null)
const diametr = ref(null)
const product = ref(null)
const filter = () => {

    history.pushState({}, null,  `${width.value ? '/w'+width.value+'': ''}`+
    `${height.value ? '/h'+height.value+'': ''}`+
    `${diametr.value ? '/d'+diametr.value+'': ''}`)

    $api.get('/filters'+
    `${width.value ? '/'+width.value+'': ''}`+
    `${height.value ? '/'+height.value+'': ''}`+
    `${diametr.value ? '/'+diametr.value+'': ''}`).then(response => {
        console.log(response.data.product)
        product.value = response.data.product
    }).catch(error => {
        console.log(error)
    })
}

</script>
<template>
    <div class="mx-auto max-w-[1920px] px-4 md:px-8 2xl:py-8">
        <div class="md:w-full lg:w-3/5 2xl:w-4/6 flex h-full ltr:md:ml-7 rtl:md:mr-7 flex-col ltr:lg:pl-7 rtl:lg:pr-7">
          <form
            @submit.prevent="filter"
            class="w-full mx-auto flex flex-col justify-center "
            noValidate
          >
            <div class="flex flex-col space-y-5">
              <div class="flex flex-col md:flex-row space-y-5 md:space-y-0 gap-4">
                <div class="w-full md:w-1/3 ">
                  <label
                    htmlFor="width"
                    class="block text-gray-600 font-semibold text-sm leading-none mb-3 cursor-pointer"
                  >
                    width
                  </label>
                  <input
                    id="width"
                    v-model="width"
                    name="width"
                    type="text"
                    placeholder="Enter Your width"
                    class="py-2 px-4 md:px-5 w-full appearance-none transition duration-150 ease-in-out border text-input text-xs lg:text-sm font-body placeholder-body min-h-12 transition duration-200 ease-in-out bg-white border-gray-300 focus:outline-none focus:border-heading h-11 md:h-12"
                    autoComplete="off"
                    spellCheck="false"
                    aria-invalid="false"
                  />
                </div>
                <div class="w-full md:w-1/3 ltr:md:ml-2.5 rtl:md:mr-2.5 ltr:lg:ml-5 rtl:lg:mr-5 mt-2 md:mt-0">
                  <label
                    htmlFor="height"
                    class="block text-gray-600 font-semibold text-sm leading-none mb-3 cursor-pointer"
                  >
                    height
                  </label>
                  <input
                    id="height"
                    name="height"
                    v-model="height"
                    type="height"
                    placeholder="Enter Your height"
                    class="py-2 px-4 md:px-5 w-full appearance-none transition duration-150 ease-in-out border text-input text-xs lg:text-sm font-body placeholder-body min-h-12 transition duration-200 ease-in-out bg-white border-gray-300 focus:outline-none focus:border-heading h-11 md:h-12"
                    autoComplete="off"
                    spellCheck="false"
                    aria-invalid="false"
                  />
                </div>
                <div class="w-full md:w-1/3 ltr:md:ml-2.5 rtl:md:mr-2.5 ltr:lg:ml-5 rtl:lg:mr-5 mt-2 md:mt-0">
                  <label
                    htmlFor="diametr"
                    class="block text-gray-600 font-semibold text-sm leading-none mb-3 cursor-pointer"
                  >
                    diametr
                  </label>
                  <input
                    id="diametr"
                    v-model="diametr"
                    name="diametr"
                    type="diametr"
                    placeholder="Enter Your diametr"
                    class="py-2 px-4 md:px-5 w-full appearance-none transition duration-150 ease-in-out border text-input text-xs lg:text-sm font-body placeholder-body min-h-12 transition duration-200 ease-in-out bg-white border-gray-300 focus:outline-none focus:border-heading h-11 md:h-12"
                    autoComplete="off"
                    spellCheck="false"
                    aria-invalid="false"
                  />
                </div>
              </div>
              
              <div class="relative">
                <button
                  data-variant="flat"
                  class="text-[13px] md:text-sm leading-4 inline-flex items-center cursor-pointer transition ease-in-out duration-300 font-semibold font-body text-center justify-center border-0 border-transparent placeholder-white focus-visible:outline-none focus:outline-none  bg-black text-white px-5 md:px-6 lg:px-8 py-4 md:py-3.5 lg:py-4 hover:text-white hover:bg-gray-600 hover:shadow-cart h-12 lg:h-14 mt-1 text-sm lg:text-base w-full sm:w-auto"

                >
                
                  Поиск
                </button>
              </div>
            </div>
          </form>
        </div>
        <ul class="w-96" v-if="product">
            <li
            class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
            {{ product.name }}
            </li>
            <li
            class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
            {{ product.nickname }}
            </li>
            <li
            class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
            {{ product.manufacturer.name }}
            </li>
            <li
            class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
            {{ product.model_auto.name }}
            </li>
            <li
            class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
            {{ product.width }} - {{ product.height }} - {{ product.diameter }}
            </li>
        </ul>
        <ul v-else>не найдено</ul>
    </div>
</template>
<template>
    <PageComponent  >
      <template v-slot:header>
        <div class="flex justify-between items-center">
          <h1 class="text-3xl font-bold text-gray-900">
            {{ model.id ? "Update Property" : "Create Property" }}
          </h1> 
        </div>

        <form @submit.prevent="saveProperty">
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                  <label for="county" class="block text-sm font-medium leading-6 text-gray-900">County</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                      <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm"> </span>
                      <input type="text" name="county" id="county" autocomplete="county" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"  />
                    </div>
                  </div>
                </div>

                <div class="sm:col-span-4">
                  <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                      <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm"> </span>
                      <input type="text" name="country" id="country" autocomplete="country" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"  />
                    </div>
                  </div>
                </div>

                <div class="sm:col-span-4">
                  <label for="town" class="block text-sm font-medium leading-6 text-gray-900">Town</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                      <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm"> </span>
                      <input type="text" name="town" id="town" autocomplete="town" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"  />
                    </div>
                  </div>
                </div>

                <div class="sm:col-span-4">
                  <label for="postcode" class="block text-sm font-medium leading-6 text-gray-900">Postcode</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                      <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm"> </span>
                      <input type="text" name="postcode" id="postcode" autocomplete="postcode" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"  />
                    </div>
                  </div>
                </div>

                <div class="col-span-full">
                  <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                  <div class="mt-2">
                    <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                  </div>
                  <p class="mt-3 text-sm leading-6 text-gray-600"></p>
                </div>

                <div class="col-span-full">
                  <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover photo</label>
                  <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                    <div class="text-center">
                      <PhotoIcon class="mx-auto h-12 w-12 text-gray-300" aria-hidden="true" />
                      <div class="mt-4 flex text-sm leading-6 text-gray-600">
                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                          <span>Upload a file</span>
                          <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                        </label>
                        <p class="pl-1">or drag and drop</p>
                      </div>
                      <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

           
          </div>

          <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
          </div>
      </form>
      </template>
      
    </PageComponent>      
  </template>
  
  <script setup>
  import store from "../store";
  import {ref} from "vue";
  import {useRoute} from "vue-router";
  import PageComponent from '../components/PageComponent.vue';
import { parse } from "@vue/compiler-dom";

import { PhotoIcon, UserCircleIcon } from '@heroicons/vue/24/solid'

  const route = useRoute();

  let model = ref({
    "county": "",
    "country": "",
    "town": "",
    "description": "",
    "full_details_url": "",
    "displayable_address": "",
    "image_url": "",
    "thumbnail_url": "",
    "latitude": "",
    "longitude": "",
    "num_bedrooms": 0,
    "num_bathrooms": 0,
    "price": "",
    "type": "",
    "property_type": {
        "id": "",
        "title": "",
        "description": ""
    }
})

if(route.params.id){
  model.value = store.state.properties.find(
    (s) =>s.id === parseInt(route.params.id)
  );
}

  </script>
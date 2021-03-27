<template>
<div>
  <ModalDelete caption="Удаление изображения" text="Вы уверенны что хотите удалить изображение?" v-if="is_show_delete_modal" v-on:doCancel="hideDeleteModal" v-on:doSubmit="deleteImg"/>

  <div class="flex w-full justify-center">
    <input name="file_selector[]" multiple type="file" accept=".png, .jpg, .jpeg" id="file_selector" ref="file_selector" v-on:change="handleFileUpload()" hidden/>

    <p @click="showFileSelector" class="p-3 transform duration-200 bg-green-500 hover:bg-green-600 hover:scale-105 rounded cursor-pointer shadow text-white">Добавить изображения</p>
  </div>

  <div v-if="is_show_progress" class="relative pt-1 mx-2">
    <div class="overflow-hidden h-4 mb-4 text-xs flex rounded bg-green-200">
      <div v-bind:style="{ width: uploadPercentage + '%' }" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500">
        {{uploadPercentage}}%
      </div>
    </div>
  </div>

  <div v-if="is_show_error" class="block text-center w-full p-3">
    <p class="font-semibold text-lg text-white bg-red-600 border border-red-700 rounded-sm py-3">Произошла ошибка при загрузке файлов</p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-3 lg:gap-4 p-4">
    <OneCard v-for="d in data" :src="images_path+d" :key="d" v-on:deleteImg="callDeleteImg"/>
  </div>
</div>
</template>

<script>
import axios from 'axios';
import OneCard from './OneCard';
import ModalDelete from './ModalDelete';

export default{
  components: {
    OneCard,ModalDelete
  },

  props:{
    list:String,//images list
    type:String,//type of upload images
    tag:String,//tag of upload images
    data_id:String//data_id of upload images
  },

  mounted:function()
  {
    var images = this.list.split(';');

    images.forEach(el => {
      if (el) this.data.push(el);
    });
  },

  methods: {
    showFileSelector:function()
    {
      document.getElementById('file_selector').click();
    },

    // UPLOAD NEW IMAGE
    handleFileUpload:function()
    {
      var imgs = this.$refs.file_selector.files;
      var files_count = imgs.length;

      if (files_count==0) return;

      let fd = new FormData;
      for (let i=0;i<files_count;i++)
      {
          fd.append('image['+i+']',imgs[i]);
      }

      if (this.type) fd.append('type',this.type);
      if (this.data_id) fd.append('data_id',this.data_id);
      if (this.tag) fd.append('tag',this.tag);

      this.is_show_progress = true;
      this.is_show_error = false;
      let self = this;

      axios.post( this.load_path,
          fd,
          {
            headers: {
                'Content-Type': 'multipart/form-data'
            },
            onUploadProgress: function(progressEvent) {
              this.uploadPercentage = parseInt(Math.round(( progressEvent.loaded / progressEvent.total) * 100))
            }.bind(this)
          }
        ).then(function(data){
          self.is_show_progress = false;
          self.is_show_error = false;

          console.log(data);

          if (data.data.success)
          {
            data.data.image.forEach(element => {
              self.data.push(element);
            });
          } else
          {
            console.log('failed load images');
            console.log(data);
          }
        })
        .catch(function(data){
          self.is_show_progress = false;
          self.is_show_error = true;

            console.log('cant load images');
            console.log(data);
        });
    },

    // WHEN CLICK DELETE BUTTON
    callDeleteImg:function(img_src)
    {
      this.target_to_delete = img_src;
      this.is_show_delete_modal = true;
    },

    hideDeleteModal:function()
    {
      this.is_show_delete_modal = false;
    },

    // DELETE IMAGE -- WHEN CLICK "OK" AT MODAL DELETE WINDOW
    deleteImg:function()
    {
      var pos = this.data.indexOf(this.target_to_delete);
      var deleted_img = this.data.splice(pos, 1)[0];

      this.is_show_delete_modal = false;
      this.target_to_delete = '';

      axios.post(this.delete_path,{filename:deleted_img}).catch(
        function()
        {
          console.log('Cant delete image');
        }
      );
    },
  },

  data:
    function () {
      return {
        // path that need to be added
        images_path:'/upload/images/',
        // post method to load image
        load_path:'/image/upload',
        // post method to delete image by src name
        delete_path:'/image/delete',

        is_show_delete_modal:false,
        target_to_delete:'',
        data:[],
        is_show_progress:false,
        is_show_error:false,
        uploadPercentage:0,
      }
    }
}
</script>
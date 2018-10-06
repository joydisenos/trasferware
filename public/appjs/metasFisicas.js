Vue.config.devtools = true;

new Vue({
    el: '#app',
    data () {
        return {
            delobj: '',
            title: '',
            spin: false,
            act: 'post',
            lists: [],
            selectemails: [],
            unlookview: false,
            item: {
                id: 0,
                cod_ente: '',
                denominacion_en: '',
                organ: '',
                cod_new_stage: '',
                proyecto: '',
                anio_start: '',
                anio_end: '',
                name:'',
                metas_fisicas_id: 0,
                approved_amount: 0,
                modified_amount: 0,
                programmed_amount: 0,
                amount_executed: 0,
                executed_accumulated: 0,
                programmed_accumulated: 0
            },
            filters: {
                name: ''
            },
            orders: {
                field: 'id',
                type: 'desc'
            },
            pager: {
                page: 1,
                recordpage: 9
            },
            totalpage: 0,
        }
    },
    mounted () {
        this.getlist()
    },
    methods: {
        getlist () {

            this.spin = true;

            axios({
                method: 'get',

                url: urldomine + 'list',

              
            }).then(response => {

                this.spin = false;

                this.lists = response.data.list;
                
                this.totalpage = Math.ceil(response.data.total / this.pager.recordpage)

            }).catch(e => {
                this.spin = false;
                toastr["error"](e.response.data)
            })

        },
        getlistsearch (pFil, pOrder, pPager) {

            if (pFil !== undefined) { this.filters = pFil }

            if (pOrder !== undefined) { this.orders = pOrder }

            if (pPager !== undefined) { this.pager = pPager }

            this.spin = true;

            axios({
                method: 'get',

                url: urldomine + 'listSearch',

                params: {start: this.pager.page - 1, take: this.pager.recordpage, filters: this.filters, orders: this.orders}

            }).then(response => {

                this.spin = false;

                this.lists = response.data.list;

                this.totalpage = Math.ceil(response.data.total / this.pager.recordpage)

            }).catch(e => {

                this.spin = false;

                toastr["error"](e.response.data)
            })
        },
        cargar ()
        {
            var $avatarImage, $avatarInput, $avatarForm;

            $avatarImage = $('#avatarImage');
            $avatarInput = $('#avatarInput');
            $avatarForm = $('#avatarForm');
            this.spin = false;
            
            $avatarInput.click();
            

            $avatarInput.on('change', function () {
                
                
            let data = {

                'data': new FormData($('#avatarForm')[0])
            
            };

            axios({
                method: 'post',

                url: urldomine + 'import-metasFisicas',

                data: data

            }).then(response => {

                this.spin = false;

                toastr["success"](response.data);

                this.getlist()


            }).catch(e => {

                this.spin = false;

                toastr["error"](e.response.data)
            })

            });
        },
        edit (it) {

            this.item = JSON.parse(JSON.stringify(it));

            this.act = 'put';

            $('#editmetasfisicas').modal('show');
        },
        save () {

            this.spin = true;

            let data = {

                'proyectos': this.item
            
            };

            axios({
                method: 'post',

                url: urldomine + '/edit-metafisica',

                data: data

            }).then(response => {

                this.spin = false;

                toastr["success"](response.data);

               
                $('#editmetasfisicas').modal('hide');

                this.getlist();


            }).catch(e => {

                this.spin = false;

                toastr["error"](e.response.data)
            })

        },
        delitem () {

            this.spin = true;

            axios({

                method: 'delete',

                url: urldomine + 'eliminar-metafisica/' + this.item.id

            }).then(response => {

                this.spin = false;

                $('#modaldelete').modal('hide');

                toastr["success"](response.data);

                this.getlist();

            }).catch(e => {

                this.spin = false;

                toastr["error"](e.response.data)

            })

        },
        showdelete(it) {

            this.item = it;

            this.delobj = it.cod_ente;

            $('#modaldelete').modal('show')

        },
        showMetas (it){
            this.item = JSON.parse(JSON.stringify(it));

            this.act = 'put';

            $('#metasfisicas').modal('show');

        }
    }
});
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
            grants: [],
            unlookview: false,
            item: {
                id: 0,
                name: ''
            },
            filters: {
                name: ''
            },
            orders: {
                field: 'name',
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
        getlist (pFil, pOrder, pPager) {

            if (pFil !== undefined) { this.filters = pFil }

            if (pOrder !== undefined) { this.orders = pOrder }

            if (pPager !== undefined) { this.pager = pPager }

            this.spin = true;

            axios({
                method: 'get',

                url: urldomine + 'api/roles/list',

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
        add () {
            this.title = 'Añadir rol';

            this.item.name = '';

            this.grants = [];

            this.act = 'post';

            this.unlookview = true
        },
        edit (it) {

            this.item = it;

            this.act = 'put';

            this.title = 'Actualizar rol: ' + this.item.name;

            axios.get(urldomine + 'api/roles/permission/' + this.item.id).then(res => {

                this.grants = res.data;

                this.unlookview = true
            });
        },
        save () {

            let datos = {

                'rol': this.item.name,
                'permission': this.grants
            };

           this.spin = true;

                axios({
                    method: this.act,

                    url: urldomine + 'api/roles' + (this.act === 'post' ? '' : '/' + this.item.id),

                    data: datos

                }).then(response => {

                    this.spin = false;

                    toastr["success"](response.data);

                    this.getlist();

                    this.unlookview = false

                }).catch(e => {

                    this.spin = false;

                    toastr["error"](e.response.data)
                })

        },
        delitem () {
            this.spin = true;
            axios({
                method: 'delete',
                url: urldomine + 'api/roles/' + this.item.id
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

            this.delobj  = it.name;

            $('#modaldelete').modal('show')
        },
        close () {

            this.unlookview = false
        },
        pass () {

            return this.item.name !== '' && this.grants.length > 0

        }
    }
});
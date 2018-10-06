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
            roles: [],
            rol: {
                id: 0,
                name: '',
            },
            selectemails: [],
            unlookview: false,
            repassword: '',
            item: {
                id: 0,
                name: '',
                email: '',
                password: '',
                rol: '',
                rol_id: 0,
                status_id: false
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

                url: urldomine + 'api/users/list',

                params: {start: this.pager.page - 1, take: this.pager.recordpage, filters: this.filters, orders: this.orders}

            }).then(response => {

                this.spin = false;

                this.lists = response.data.list;

                this.roles = response.data.roles;

                this.totalpage = Math.ceil(response.data.total / this.pager.recordpage)

            }).catch(e => {
                this.spin = false;
                toastr["error"](e.response.data)
            })

        },
        add () {

            this.title = 'Añadir usuario';

            this.item.name = '';

            this.item.email = '';

            this.item.rol = '';

            this.item.rol_id = 0;

            this.item.status_id = false;

            this.item.password = '';

            this.repassword = '';

            this.act = 'post';

            this.unlookview = true

        },
        edit (it) {

            this.item = JSON.parse(JSON.stringify(it));

            this.act = 'put';

            this.title = 'Actualizar usuario: ' + this.item.name;

            this.unlookview = true

        },
        save () {

            this.spin = true;

            let data = {

                'user': this.item

            };

            axios({
                method: this.act,

                url: urldomine + 'api/users' + (this.act === 'post' ? '' : '/' + this.item.id),

                data: data

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

                url: urldomine + 'api/users/' + this.item.id

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
        setRol (rol) {

          this.item.rol = rol.name;

          this.item.rol_id = rol.id

        },
        showdelete(it) {

            this.item = it;

            this.delobj = it.name;

            $('#modaldelete').modal('show')

        },
        close () {

            this.add();

            this.unlookview = false

        },
        pass () {

           let password = this.item.password === this.repassword;

           let email = /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/i.test(this.item.email);

           let rol = this.item.rol_id !== 0;

           let name = this.item.name !== '';

           return email && password && rol && name
        }
    }
});
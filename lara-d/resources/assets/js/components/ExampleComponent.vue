<template>
    <div>
        <search-filter v-on:call-parent-search="searchFunction"></search-filter>
        <div class="table-number">{{ total }}件中 {{ from }} 〜 {{ to }}件</div>
        <div class="row table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="table-header">
                        <th class="download">ダウンロード</th>
                        <th class="owner">オーナー名</th>
                        <th>コメント</th>
                        <th>ファイル名</th>
                        <th class="created-at">アップロード日時</th>
                        <th class="delete">削除</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="file in files" :key="file.id">
                        <td>
                            <a :href="getLinkFile(file.id)">
                                <i class="fa fa-cloud-download" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>{{ file.upload_owner_name }}</td>
                        <td><div v-html="nl2br(file.file_comment)"></div>
                            <span v-if="file.search_tag1"><i class="fa fa-search"></i>{{file.search_tag1}}</span>
                            <span v-if="file.search_tag2"><i class="fa fa-search"></i>{{file.search_tag2}}</span>
                            <span v-if="file.search_tag3"><i class="fa fa-search"></i>{{file.search_tag3}}</span>
                            <span v-if="file.search_tag4"><i class="fa fa-search"></i>{{file.search_tag4}}</span>
                        </td>
                        <td>{{ file.file_name }}</td>
                        <td>{{ file.created_at }}</td>
                        <td>
                            <form method="post" action="" class="form-horizontal" v-if="file.upload_user_id == null || file.upload_user_id == 0" :id="file.id">
                                <div class="form-group">
                                    <div class="form-inline">
                                        <input type="text" class="input-alternate" placeholder="削除パスワード" @keyup.enter="openConfirmDialog(file.file_name, file.id)">
                                        <input type="hidden" name="id" class="form-control" :value="file.id">
                                        <button type="button" class="btn btn-info btn-delete" @click="openConfirmDialog(file.file_name, file.id)">削除</button>
                                    </div>
                                </div>
                                <input type="hidden" name="_token" :value="csrf">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-left">
            <nav class="my-4 pt-2">
                <ul class="pagination pagination-circle mb-0">
                    <li class="page-item clearfix d-none d-md-block" @click="pagenate(first_page_url + '&ordertype=' + order_type + '&keyword=' + keyword )">
                        <a class="page-link waves-effect waves-effect">First</a>
                    </li>
                    <li :class="[{disabled: prev_page_url === null}, 'page-item']">
                        <a :class="[{disabled: prev_page_url === null}, 'page-link waves-effect waves-effect']" aria-label="Previous" @click="pagenate(prev_page_url + '&ordertype=' + order_type + '&keyword=' + keyword)">
                            <span aria-hidden="true">«</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li
                        v-for="i in displayPageRange"
                        :class="[{active: i === current_page}, 'page-item']" :key="i">
                        <a @click="pageSelect(i)" class="page-link waves-effect waves-effect">{{ i }}</a>
                    </li>
                    <li :class="[{disabled: next_page_url === null}, 'page-item']">
                        <a :class="[{disabled: next_page_url === null}, 'page-link waves-effect waves-effect']" aria-label="Next"  @click="pagenate(next_page_url + '&ordertype=' + order_type + '&keyword=' + keyword)">
                            <span aria-hidden="true">»</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                    <li class="page-item clearfix d-none d-md-block">
                        <a class="page-link waves-effect waves-effect" @click="pagenate(last_page_url + '&ordertype=' + order_type + '&keyword=' + keyword)">Last</a>
                    </li>
                </ul>
            </nav>
        </div>
        <dialog id="confirm-dialog" @click.stop>
            <p>本当に「<span id="delete-file-name"></span>」を削除しますか？</p>
            <input type="hidden" id="delete-form-id" value="">
            <menu>
              <button id="cancel" class="btn btn-info" @click="dialogClose">キャンセル</button>
              <button type="button" class="btn btn-danger" @click="submitDelete">削除する</button>
            </menu>
        </dialog>
    </div>
</template>

<script>
import SearchFilter from "./SearchComponent";

export default {
  components: {
    SearchFilter
  },
  data() {
    return {
      files: [],
      current_page: 0,
      last_page: 0,
      total: 0,
      from: 0,
      to: 0,
      page_range: 10,
      csrf: myToken.csrfToken,
      first_page_url: "",
      last_page_url: "",
      next_page_url: "",
      prev_page_url: "",
      path: "",
      seach_type: document.getElementById("search-type").value,
      keyword: "",
      order_type: "desc"
    };
  },
  mounted() {
    this.pagenate("/api/search/" + this.seach_type);
  },
  computed: {
    displayPageRange() {
      const half = Math.ceil(this.page_range / 2);
      let start, end;

      if (this.last_page < this.page_range) {
        start = 1;
        end = this.last_page;
      } else if (this.current_page < half) {
        start = 1;
        end = start + this.page_range - 1;
      } else if (this.last_page - half < this.current_page) {
        end = this.last_page;
        start = end - this.page_range + 1;
      } else {
        start = this.current_page - half + 1;
        end = this.current_page + half;
      }

      let indexes = [];
      for (let i = start; i <= end; i++) {
        indexes.push(i);
      }
      return indexes;
    }
  },
  methods: {
    searchFunction(keyword, order_type) {
      this.keyword = keyword;
      this.order_type = order_type;
      this.pagenate(this.path + "?ordertype=" + this.order_type + "&keyword=" + this.keyword);
    },
    getLinkFile: function(id) {
      return id;
    },
    nl2br(value) {
      return value !== null ? value.replace(/\n/g, "<br>") : "";
    },
    pageSelect(i) {
      this.pagenate(this.path + "?page=" + String(i) + "&ordertype=" + this.order_type + "&keyword=" + this.keyword);
    },
    pagenate(url) {
      const spinHandle = loadingOverlay().activate();
      setTimeout(function() {
        loadingOverlay().cancel(spinHandle);
      }, 1000);
      axios.get(url).then(res => {
        this.files = res.data.data;
        this.current_page = res.data.current_page;
        this.last_page = res.data.last_page;
        this.total = res.data.total;
        this.from = res.data.from;
        this.to = res.data.to;
        this.first_page_url = res.data.first_page_url;
        this.last_page_url = res.data.last_page_url;
        this.next_page_url = res.data.next_page_url;
        this.prev_page_url = res.data.prev_page_url;
        this.path = res.data.path;
        console.log(res);
        window.scrollTo(0, 0);
      });
    },
    openConfirmDialog(file_name, file_id) {
      document.getElementById("confirm-dialog").showModal();
      document.getElementById("delete-file-name").innerText = file_name;
      document.getElementById("delete-form-id").value = file_id;
    },
    dialogClose() {
      document.getElementById("confirm-dialog").close();
    },
    submitDelete() {
      document.getElementById(String(document.getElementById("delete-form-id").value)).submit();
    }
  }
};
</script>

<style lang="scss" scoped>
.table-header {
  .download,
  .owner {
    width: 100px;
  }
  .created-at {
    width: 160px;
  }
  .delete {
    width: 200px;
  }
}
dialog:not([open]) {
  display: none;
}
dialog {
  border: none;
  menu {
    padding: 0;
    margin: 0;
  }
  p {
    text-align: center;
  }
}
@media screen and (max-width: 767px) {
  table {
    overflow: auto;
    white-space: nowrap;
  }
}
</style>


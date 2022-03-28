"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_collection_variables_Variables_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/collection/variables/Variables.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/collection/variables/Variables.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: "Variables",
  data: function data() {
    return {
      variables: []
    };
  },
  mounted: function mounted() {
    this.getVariables();
  },
  methods: {
    save: function save() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return axios.post("/save-variables/".concat(_this.id), {
                  variables: _this.variables
                });

              case 2:
                _context.next = 4;
                return _this.getVariables();

              case 4:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    getVariables: function getVariables() {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee2() {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _context2.next = 2;
                return axios.get("/get-variables/".concat(_this2.id));

              case 2:
                response = _context2.sent;
                _this2.variables = response.data.variables || [];
                if (!_this2.variables.length) _this2.variables.push({
                  name: '',
                  initial_value: '',
                  current_value: ''
                });

              case 5:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    }
  },
  computed: {
    id: function id() {
      return this.$route.params.id;
    }
  }
});

/***/ }),

/***/ "./resources/js/components/collection/variables/Variables.vue":
/*!********************************************************************!*\
  !*** ./resources/js/components/collection/variables/Variables.vue ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Variables_vue_vue_type_template_id_3ba817d9_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Variables.vue?vue&type=template&id=3ba817d9&scoped=true& */ "./resources/js/components/collection/variables/Variables.vue?vue&type=template&id=3ba817d9&scoped=true&");
/* harmony import */ var _Variables_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Variables.vue?vue&type=script&lang=js& */ "./resources/js/components/collection/variables/Variables.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Variables_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Variables_vue_vue_type_template_id_3ba817d9_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _Variables_vue_vue_type_template_id_3ba817d9_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "3ba817d9",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/collection/variables/Variables.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/collection/variables/Variables.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************!*\
  !*** ./resources/js/components/collection/variables/Variables.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Variables_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Variables.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/collection/variables/Variables.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Variables_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/collection/variables/Variables.vue?vue&type=template&id=3ba817d9&scoped=true&":
/*!***************************************************************************************************************!*\
  !*** ./resources/js/components/collection/variables/Variables.vue?vue&type=template&id=3ba817d9&scoped=true& ***!
  \***************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Variables_vue_vue_type_template_id_3ba817d9_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Variables_vue_vue_type_template_id_3ba817d9_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Variables_vue_vue_type_template_id_3ba817d9_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Variables.vue?vue&type=template&id=3ba817d9&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/collection/variables/Variables.vue?vue&type=template&id=3ba817d9&scoped=true&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/collection/variables/Variables.vue?vue&type=template&id=3ba817d9&scoped=true&":
/*!******************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/collection/variables/Variables.vue?vue&type=template&id=3ba817d9&scoped=true& ***!
  \******************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c(
        "v-container",
        [
          _c(
            "v-row",
            [
              _c(
                "v-col",
                [_c("v-btn", { on: { click: _vm.save } }, [_vm._v("save")])],
                1
              ),
            ],
            1
          ),
          _vm._v(" "),
          _vm._l(_vm.variables, function (variable, index) {
            return _c(
              "v-row",
              { key: index, attrs: { "no-gutters": "" } },
              [
                _c(
                  "v-col",
                  { attrs: { cols: "3" } },
                  [
                    _c("v-text-field", {
                      attrs: { "prepend-icon": "mdi-plus", outlined: "" },
                      on: {
                        "click:prepend": function ($event) {
                          return _vm.variables.push({
                            name: "",
                            initial_value: "",
                            current_value: "",
                          })
                        },
                      },
                      model: {
                        value: variable.name,
                        callback: function ($$v) {
                          _vm.$set(variable, "name", $$v)
                        },
                        expression: "variable.name",
                      },
                    }),
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "v-col",
                  [
                    _c("v-text-field", {
                      attrs: { outlined: "" },
                      model: {
                        value: variable.initial_value,
                        callback: function ($$v) {
                          _vm.$set(variable, "initial_value", $$v)
                        },
                        expression: "variable.initial_value",
                      },
                    }),
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "v-col",
                  [
                    _c("v-text-field", {
                      attrs: { outlined: "" },
                      model: {
                        value: variable.current_value,
                        callback: function ($$v) {
                          _vm.$set(variable, "current_value", $$v)
                        },
                        expression: "variable.current_value",
                      },
                    }),
                  ],
                  1
                ),
              ],
              1
            )
          }),
        ],
        2
      ),
      _vm._v(" "),
      _c("h1", [_vm._v(_vm._s(_vm.variables))]),
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);
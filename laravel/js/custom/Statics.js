/**
 * Created by rojase on 05-05-2015.
 */

angular
    .module('appTest')
    .factory('Statics', function () {
        return {
            MODULE_PARAM_TOTAL: 16,
//            URL:'http://adm.genesisproject.net'
//            URL:'http://admin-service.genesisproject.net'
            URL: "http://localhost:8080/blpInventario",
            MSG: {
                REQUIRED: 'Campo Requerido',
                MAX_STRING: 'caracteres máximo',
                MIN_STRING: 'caracteres mínimo',
                MAX_NUMBER: 'digitos máximo',
                MIN_NUMBER: 'digitos mínimo'
            },
            TIPODATO: {
                NOMBRE: 'Nombre',
                APELLIDO: 'Apellido',
                CI: 'Cedula de Identidad',
                CODIGO: 'Codigo',
                CORREO: 'Correo Electrónico',
                FECHA: 'Fecha',
                NUMERO: 'Número',
                DECIMAL: 'Número Decimal',
                ABREVIACION: 'Abreviación',
                MEDIDA: 'Unidad de Medida',
                FORMULA: 'Fórmula',
                DENOMINACION: 'Denominación Moneda',
                VALOR: 'Valor Moneda',
                DESCRIPCION: 'Descripción',
                DIRECCION: 'Dirección',
                CONCEPTO: 'Concepto',
                MUNICIPIO: 'Municipio',
                SIGLA: 'Sigla',
                LECTURA: 'Lectura Actual'
            },
            HEADER: {
                MODAL: {
                    EDIT: 'Edición Registro - ',
                    ADD: 'Nuevo Registro - '
                }
            },
            ESTADO: [
                {id: '1', nombre: 'Habilitado'},
                {id: '0', nombre: 'Inhabilitado'}
            ],
            DEPARTAMENTOS: [
                {id: 'LP', nombre: 'La Paz'},
                {id: 'OR', nombre: 'Oruro'},
                {id: 'PT', nombre: 'Potosi'},
                {id: 'CB', nombre: 'Cochabamba'},
                {id: 'SC', nombre: 'Santa Cruz'},
                {id: 'TJ', nombre: 'Tarija'},
                {id: 'CH', nombre: 'Chuquisaca'},
                {id: 'BN', nombre: 'Beni'},
                {id: 'PA', nombre: 'Pando'}
            ],
            AUTORIZACION: [
                {id: 'L', nombre: 'Lectura'},
                {id: 'R', nombre: 'Reportes'},
                {id: 'E', nombre: 'Escritura'}
            ],
            SEXO: [
                {id: '0', nombre: 'Femenino'},
                {id: '1', nombre: 'Masculino'}
            ],
            Placeholder: function (TipoDato) {
                if (TipoDato) {
                    return ('Ingrese ' + this.TIPODATO[TipoDato]);
                }
                return null;
            },
            HTTPS: {debuger: false},
            runAuthen: false,
            develop: false
        };
    });

// config datepicker borndate
$('#tgl_lahir').datetimepicker({
    locale: moment.locale('id', {
        months : ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
        monthsShort : ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des']
    }),
    format: 'DD/MM/YYYY',
    maxDate: moment().add(-20, 'years').endOf('years'), // set last month of -20 years from now
    minDate: moment().add(-28, 'years').endOf('years'), // set last month of -2 years from now
    defaultDate: ''
});
$('#tgl_lahir').val('') // remove initial value

$('#tgl_lahir').on('dp.change dp.show', function() {
    $('#registrasi').formValidation('revalidateField', 'tgl_lahir');
});

// default form validation
$('#form-user').formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        nama_user: {
            validators: {
                notEmpty: {
                    message: 'Nama Lengkap tidak boleh kosong'
                },
                stringLength: {
                    min: 3,
                    message: 'Nama pengguna harus lebih dari 2 karakter'
                }
            }
        },
        email: {
            validators: {
                emailAddress: {
                    message: 'Email tidak valid'
                },
                notEmpty: {
                    message: 'Email tidak boleh kosong'
                }
            }
        },
        username: {
            validators: {
                notEmpty: {
                    message: 'Nama pengguna tidak boleh kosong'
                },
                stringLength: {
                    max: 30,
                    message: 'Nama pengguna harus dibawah 30 karakter'
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9_\.]+$/,
                    message: 'Nama pengguna tidak boleh menggunakan symbol'
                }
            }
        },
        jk_user: {
            validators: {
                notEmpty: {
                    message: 'Pilih jenis kelamin'
                }
            }
        },
        tgl_lahir: {
            validators: {
                notEmpty: {
                    message: 'Tanggal lahir tidak boleh kosong'
                },
                regexp: {
                    regexp: /^[0-9]{2}\/+[0-9]{2}\/+[0-9]{4}$/,
                    message: 'Masukan dengan format DD/MM/YYYY'
                }
            }
        },
        password: {
            validators: {
                notEmpty: {
                    message: 'Kata sandi tidak boleh kosong'
                },
                stringLength: {
                    min: 6,
                    max: 15,
                    message: 'Kata sandi terlalu pendek'
                }
            }
        },
        konfirmasi_password: {
            validators: {
                notEmpty: {
                    message: 'Memastikan kata sandi tidak boleh kosong'
                },
                identical: {
                    field: 'password',
                    message: 'Kata sandi tidak sesuai'
                }
            }
        }
    }
});

$(function() {
    var form_user = `<form action="http://localhost/pa-telkom/c_autentikasi/lakukan_registrasi" method="POST" id="form-user" class="form-horizontal" style="padding-left:15px;padding-right:15px">
        <div class="form-group">
            <input type="hidden" name="level_user" value="user" id="level_user" class="form-control">
            <input type="text" name="nama_user" id="nama_user" class="form-control" placeholder="Nama Lengkap" required="" autocomplete="false">
        </div>
        <div class="form-group">
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" required="" autocomplete="false">
        </div>
        <div class="form-group">
            <input type="text" name="username" id="username" class="form-control" placeholder="Nama Pengguna" required="" autocomplete="false" maxlength="30">
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label no-padding" style="text-align:left">Jenis Kelamin </label>
            <div class="col-xs-9 no-padding">
            <div class="radio no-padding">
                <label><input type="radio" name="jk_user" value="male">Laki-laki</label>
                <label><input type="radio" name="jk_user" value="female">Perempuan</label>
            </div>
            </div>
        </div>

        <div class="form-group">
            <input  type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required="" autocomplete="false">
        </div>


        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Kata sandi" required="" maxlength="15">
        </div>
        <div class="form-group">
            <input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control" placeholder="Ulang Kata sandi" required="" maxlength="15">
        </div>
        <div class="row">
        <button type="submit" name="submitButton" class="btn btn-block btn-login btn-lg">Daftar</button><br>
        <p>Sudah punya akun?  <a href="<?php echo site_url('masuk-akun'); ?>">masuk disini</a></p>
        </div>
    </form>`;

    var form_dokter = `<form action="http://localhost/pa-telkom/c_autentikasi/lakukan_registrasi" method="POST" id="form-dokter" class="form-horizontal" style="padding-left:15px;padding-right:15px">
        <div class="form-group">
            <input type="hidden" name="level_user" value="user" id="level_user" class="form-control">
            <input type="text" name="nama_user" id="nama_user" class="form-control" placeholder="Nama Lengkap" required="" autocomplete="false">
        </div>
        <div class="form-group">
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" required="" autocomplete="false">
        </div>
        <div class="form-group">
            <input type="text" name="username" id="username" class="form-control" placeholder="Nama Pengguna" required="" autocomplete="false" maxlength="30">
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label no-padding" style="text-align:left">Jenis Kelamin </label>
            <div class="col-xs-9 no-padding">
            <div class="radio no-padding">
                <label><input type="radio" name="jk_user" value="male">Laki-laki</label>
                <label><input type="radio" name="jk_user" value="female">Perempuan</label>
            </div>
            </div>
        </div>

        <div class="form-group">
            <input  type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required="" autocomplete="false">
        </div>


        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Kata sandi" required="" maxlength="15">
        </div>
        <div class="form-group">
            <input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control" placeholder="Ulang Kata sandi" required="" maxlength="15">
        </div>
        <!-- <div id="form-dokter" class="hide"> -->
        <hr>
        <div class="form-group">
            <label><span style="font-size: 24px;color:#e67e22">*</span><strong>Input NIP dan Upload ijazah dokter anda untuk diverifikasi admin.</strong></label>
        </div>
        <div class="form-group">
            <input type="file" name="berkas" accept="image/*" id="berkas">                            
        </div>
        
        <div class="form-group">
            <input  type="text" name="nip" id="nip" class="form-control" placeholder="NIP" autocomplete="false">
        </div>
        <!-- </div> -->
        <div class="row">
        <button type="submit" name="submitButton" class="btn btn-block btn-login btn-lg">Daftar</button><br>
        <p>Sudah punya akun?  <a href="<?php echo site_url('masuk-akun'); ?>">masuk disini</a></p>
        </div>
    </form>`;

    $('input[name="type"]').on('change', function () {
        if($(this).val() === 'u') {
            $('form').remove();
            $("#section-form").prepend(form_user);
            // $('div#form-dokter').addClass('hide')
            // $('div#form-user').removeClass('hide')
            $('#tgl_lahir').datetimepicker({
                locale: moment.locale('id', {
                    months : ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
                    monthsShort : ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des']
                }),
                format: 'DD/MM/YYYY',
                maxDate: moment().add(-20, 'years').endOf('years'), // set last month of -20 years from now
                minDate: moment().add(-28, 'years').endOf('years'), // set last month of -2 years from now
                defaultDate: ''
            });
            $('#tgl_lahir').val('') // remove initial value
            
            $('#tgl_lahir').on('dp.change dp.show', function() {
                $('#registrasi').formValidation('revalidateField', 'tgl_lahir');
            });
            $('#form-user').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    nama_user: {
                        validators: {
                            notEmpty: {
                                message: 'Nama Lengkap tidak boleh kosong'
                            },
                            stringLength: {
                                min: 3,
                                message: 'Nama pengguna harus lebih dari 2 karakter'
                            }
                        }
                    },
                    email: {
                        validators: {
                            emailAddress: {
                                message: 'Email tidak valid'
                            },
                            notEmpty: {
                                message: 'Email tidak boleh kosong'
                            }
                        }
                    },
                    username: {
                        validators: {
                            notEmpty: {
                                message: 'Nama pengguna tidak boleh kosong'
                            },
                            stringLength: {
                                max: 30,
                                message: 'Nama pengguna harus dibawah 30 karakter'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: 'Nama pengguna tidak boleh menggunakan symbol'
                            }
                        }
                    },
                    jk_user: {
                        validators: {
                            notEmpty: {
                                message: 'Pilih jenis kelamin'
                            }
                        }
                    },
                    tgl_lahir: {
                        validators: {
                            notEmpty: {
                                message: 'Tanggal lahir tidak boleh kosong'
                            },
                            regexp: {
                                regexp: /^[0-9]{2}\/+[0-9]{2}\/+[0-9]{4}$/,
                                message: 'Masukan dengan format DD/MM/YYYY'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Kata sandi tidak boleh kosong'
                            },
                            stringLength: {
                                min: 6,
                                max: 15,
                                message: 'Kata sandi terlalu pendek'
                            }
                        }
                    },
                    konfirmasi_password: {
                        validators: {
                            notEmpty: {
                                message: 'Memastikan kata sandi tidak boleh kosong'
                            },
                            identical: {
                                field: 'password',
                                message: 'Kata sandi tidak sesuai'
                            }
                        }
                    }
                }
            });
        } else {
            $('form').remove();
            $("#section-form").prepend(form_dokter);
            // $('div#form-dokter').removeClass('hide')
            // $('div#form-user').addClass('hide')
            $('#tgl_lahir').datetimepicker({
                locale: moment.locale('id', {
                    months : ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
                    monthsShort : ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des']
                }),
                format: 'DD/MM/YYYY',
                maxDate: moment().add(-20, 'years').endOf('years'), // set last month of -20 years from now
                minDate: moment().add(-28, 'years').endOf('years'), // set last month of -2 years from now
                defaultDate: ''
            });
            $('#tgl_lahir').val('') // remove initial value
            
            $('#tgl_lahir').on('dp.change dp.show', function() {
                $('#registrasi').formValidation('revalidateField', 'tgl_lahir');
            });
            $('#form-dokter').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    nama_user: {
                        validators: {
                            notEmpty: {
                                message: 'Nama Lengkap tidak boleh kosong'
                            },
                            stringLength: {
                                min: 3,
                                message: 'Nama pengguna harus lebih dari 2 karakter'
                            }
                        }
                    },
                    email: {
                        validators: {
                            emailAddress: {
                                message: 'Email tidak valid'
                            },
                            notEmpty: {
                                message: 'Email tidak boleh kosong'
                            }
                        }
                    },
                    username: {
                        validators: {
                            notEmpty: {
                                message: 'Nama pengguna tidak boleh kosong'
                            },
                            stringLength: {
                                max: 30,
                                message: 'Nama pengguna harus dibawah 30 karakter'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: 'Nama pengguna tidak boleh menggunakan symbol'
                            }
                        }
                    },
                    jk_user: {
                        validators: {
                            notEmpty: {
                                message: 'Pilih jenis kelamin'
                            }
                        }
                    },
                    tgl_lahir: {
                        validators: {
                            notEmpty: {
                                message: 'Tanggal lahir tidak boleh kosong'
                            },
                            regexp: {
                                regexp: /^[0-9]{2}\/+[0-9]{2}\/+[0-9]{4}$/,
                                message: 'Masukan dengan format DD/MM/YYYY'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Kata sandi tidak boleh kosong'
                            },
                            stringLength: {
                                min: 6,
                                max: 15,
                                message: 'Kata sandi terlalu pendek'
                            }
                        }
                    },
                    konfirmasi_password: {
                        validators: {
                            notEmpty: {
                                message: 'Memastikan kata sandi tidak boleh kosong'
                            },
                            identical: {
                                field: 'password',
                                message: 'Kata sandi tidak sesuai'
                            }
                        }
                    },
                    nip: {
                        validators: {
                            notEmpty: {
                                message: 'Nip tidak boleh kosong'
                            }
                        }
                    },
                    berkas: {
                        validators: {
                            notEmpty: {
                                message: 'Berkas tidak boleh kosong'
                            }
                        }
                    }
                }
            });
        }
    });
});
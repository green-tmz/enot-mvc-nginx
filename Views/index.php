<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <td>Настройки</td>
            <td>Подтверждение</td>
            <td>Статус</td>
            <td>Действие</td>
        </thead>
        <tbody>
            <? foreach ($data['settings'] as $keyS => $settings) { ?>
                <tr>
                    <td><?= $settings['name'] ?></td>
                    <td>
                        <select onchange="changeConfirmations(<?= $keyS ?>, this)">
                            <? foreach ($data['confirmations'] as $keyC => $confirmation) { ?>
                                <option value="<?= $keyC ?>"><?= $confirmation ?></option>
                            <? } ?>
                        </select>
                    </td>
                    <td>
                        <select onchange="changeStatus(<?= $keyS ?>, this)">
                            <?php if ($settings['status'] == true) { ?>
                                <option value="0">Выкл.</option>
                                <option selected value="1">Вкл.</option>
                            <?php } else { ?>
                                <option selected value="0">Выкл.</option>
                                <option value="1">Вкл.</option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <button onClick="getCode(<?= $keyS ?>, <?= $keyC ?>)">Сохранить</button>
                    </td>
                </tr>
            <? } ?>
        </tbody>
    </table>

    <div class="result">
        <form id="save">
            <div class="form-field">
                <span id="response"></span>
            </div>
            <div class="form-field">
                <span class="code-label">Ваш код</span>
                <span class="code-value"></span>
            </div>
            <div class="form-field">
                <label for="code">Введите код</label>
                <input type="number" id="code">
            </div>
            <button type="submit">Отправить</button>
        </form>
    </div>

    <script src="Views/resources/jquery-3.6.1.min.js"></script>
    <script>
        settingsObj = {
            'settingsId': '',
            'confirmationId': '',
            'status': false
        }

        function changeConfirmations(settings, el) {
            settingsObj = {
                'settingsId': settings,
                'confirmationId': el.value,
                'status': false
            }
        }

        function changeStatus(settings, el) {
            settingsObj.status = el.value
        }

        function getCode(settings, confirmation) {
            $("#response").text()
            $(".code-value").text()
            $.ajax({
                url: "/settings/get-code",
                method: 'POST',
                data: settingsObj
            }).done(function(data) {
                $(".code-value").text(data)
                $(".result").css('display', 'block')
            });
        }
        $(document).ready(function() {
            $("#save").submit(function(e) {
                e.preventDefault()

                $.ajax({
                    url: "/settings/save",
                    method: 'POST',
                    data: {
                        'settings': settingsObj,
                        'code': $("#code").val()
                    }
                }).done(function(data) {
                    $("#response").text(data)
                    $(".result").css('display', 'block')
                });
            })
        })
    </script>
    <style>
        .result {
            border: 1px solid black;
            margin-top: 20px;
            padding: 20px;
            display: none;
        }

        .form-field {
            margin-bottom: 10px;
        }

        .code-value {
            font-weight: bold;
        }
    </style>
</body>

</html>
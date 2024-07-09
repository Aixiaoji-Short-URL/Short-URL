<?php
include("../../Configs/Main/WebMainConfig.php");
$UseLanguage = "../..".$ConfigMain["Language"];
include($UseLanguage);
?>
    <style>
        .mdui-drawer {
            background-color: #fff;
            color: #000;
        }
        .mdui-list-item {
            color: inherit;
        }
        .sidebar-logo {
            padding: 20px;
            text-align: center;
        }
    </style>
<body class="mdui-theme-primary-indigo mdui-theme-accent-pink">
    <div class="mdui-appbar">
    <div class="mdui-toolbar mdui-color-theme">
        <!-- Add a button to toggle the sidebar -->
        <button class="mdui-btn mdui-btn-icon" mdui-drawer="{target: '#drawer', close: false}">
            <i class="mdui-icon material-icons">menu</i>
        </button>
        <a href="../home/" class="mdui-typo-title"><?php echo " Admin Panel - ".$LanguageV1["h1_index"]; ?></a>
    </div>
</div>

<div class="mdui-container">
    <div class="mdui-drawer mdui-drawer-right mdui-color-theme" id="drawer">
        <button class="mdui-btn mdui-btn-icon mdui-float-right" mdui-drawer-close>
            <i class="mdui-icon material-icons">close</i>
        </button>
        <br>
        <div class="sidebar-logo">
            <h2>Short-URL(OS)</h2>
        </div>
        <!-- Add close button -->
        <ul class="mdui-list">
            <li>
                <a href="../home/" class="mdui-list-item mdui-ripple">
                    <span class="mdui-list-item__text">Admin Home</span>
                </a>
            </li>
            <li>
                <a href="../Config-edit/" class="mdui-list-item mdui-ripple">
                    <span class="mdui-list-item__text">Config EDIT</span>
                </a>
            </li>
            <li>
                <a href="../Language-edit/" class="mdui-list-item mdui-ripple">
                    <span class="mdui-list-item__text">LanguagePack EDIT</span>
                </a>
            </li>
            <li>
                <a href="../JSON-edit/" class="mdui-list-item mdui-ripple">
                    <span class="mdui-list-item__text">Manage URL</span>
                </a>
            </li>
        </ul>
    </div>

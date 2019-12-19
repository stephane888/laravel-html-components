<?php
namespace Stephane888\LaravelHtmlComponents;

use Illuminate\Support\Str;

trait Helpers {

  public $RouteName = '';

  public function NavbarNav__item($item, $level = 0)
  {
    // build Class
    $class = [];
    if (! empty($item['class'])) {
      $class[] = $item['class'];
    }
    if (! empty($item['submenu'])) {
      $class[] = 'has-treeview';
    }
    if (! empty($item['active']) || (! empty($item['routeName']) && $this->RouteName == $item['routeName']) || (isset($item['niveau']) && $item['niveau'] == 0 && ! empty($item['routeName']) && Str::contains($this->RouteName, $item['routeName']))) {
      $class[] = 'menu-open';
      $item['active'] = 'active';
    } else {
      $item['active'] = '';
    }
    $item['class'] = implode(' ', $class);
    // build atribute for link
    $attrib = [];
    if (! empty($item['attrib'])) {
      $attrib[] = $item['attrib'];
    }
    if (! empty($item['external'])) {
      $attrib[] = 'target="_blank"';
    }
    $item['attrib'] = implode(' ', $attrib);
    // build tag
    if (empty($item['tag'])) {
      $item['tag'] = false;
    }
    // echo $level;
    return $item;
  }

  public function build_checkbox($input, $old)
  {
    return $this->build_input($input, $old);
  }

  public function build_text($input, $old)
  {
    return $this->build_input($input, $old);
  }

  public function build_textarea($input, $old)
  {
    return $this->build_input($input, $old);
  }

  protected function build_input($input, $old)
  {
    if (is_null($old)) {
      $input['old'] = (isset($input['old'])) ? $input['old'] : null;
    } else {
      $input['old'] = $old;
    }
    return $input;
  }

  protected function buildTestmenu()
  {
    return [
      [
        'title' => '<i class="fas fa-bars"></i>',
        'link' => '#',
        'html' => true,
        'active' => false,
        'class' => '',
        'icon_before' => '',
        'icon_after' => '',
        'external' => false,
        'tag' => false,
        'attrib' => 'data-widget="pushmenu"'
      ],
      [
        'title' => 'Home',
        'link' => '#',
        'active' => false,
        'class' => '',
        'icon_before' => '',
        'icon_after' => '',
        'external' => false,
        'tag' => false,
        'attrib' => ''
      ],
      [
        'title' => 'Contact',
        'link' => '#',
        'active' => false,
        'class' => '',
        'icon_before' => '',
        'icon_after' => '',
        'external' => false,
        'tag' => false,
        'attrib' => ''
      ]
    ];
  }
}
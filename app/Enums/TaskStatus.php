<?php

namespace App\Enums;

enum TaskStatus: string
{
  case TODO = 'Todo';
  case DOING = 'Doing';
  case COMPLETE = 'Complete';
}

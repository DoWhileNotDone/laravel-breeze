/**
 * @jest-environment jsdom
 */

import { describe, expect, it } from '@jest/globals'
import { mount } from '@vue/test-utils'
import App from './App'

describe('App.vue', () => {

  it('Renders', () => {

    const wrapper = mount(App);    
    expect(wrapper.text()).toContain("Hello World")

  });
  
});